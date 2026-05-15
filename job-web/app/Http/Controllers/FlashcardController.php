<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class FlashcardController extends Controller {
    
    public function index()
    {
        return view('flashcards.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'topics' => 'required|array|min:1',
            'difficulty' => 'required|string|in:beginner,intermediate',
            'amount' => 'required|integer|min:1|max:50',
            'role' => 'required|string',
        ]);

        $topics = implode(', ', $request->topics); //checkbox to array
        $amount = (int) $request->amount;
        $difficulty = $request->difficulty;
        $targetRole = $request->role;
        
        $cvContent = session('cvContent', 'No CV provided.');

        $systemPrompt = "You are an expert interview coach. Your task is to generate $amount interview questions for a $targetRole position.\n" . 
            "Use Bahasa Indonesia \n" . 
            "The difficulty level should be: $difficulty.\n" .
            "The questions should cover these topics: $topics.\n" .
            "If 'CV Based' or 'Role-based' is selected, use the following candidate context (if provided):\n" .
            $cvContent . "\n\n" .
            "Provide the response strictly in valid JSON array format. No markdown wrappers, no conversational text. " .
            "Each object in the array must have the following keys:\n" .
            "- 'question': The interview question.\n" .
            "- 'hint': A short hint on how to answer it.\n" .
            "- 'topic': The specific topic this question falls under (e.g. Behavioral, Technical).\n" .
            "Ensure the JSON is valid and the array length is exactly $amount.";
            

        try {
            $apiKey = env('GROQ_API_KEY');
            if (empty($apiKey)) {
                throw new Exception("GROQ_API_KEY is missing from .env file");
            }

            $response = Http::withToken($apiKey)
                ->timeout(60)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.3-70b-versatile',
                    'temperature' => 0.6,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => 'Generate the flashcard questions.'],
                    ],
                ]);

            if ($response->successful()) {
                $content = trim($response->json('choices.0.message.content'));
                // Strip out markdown JSON wrappers if present
                $content = preg_replace('/```json/i', '', $content);
                $content = preg_replace('/```/', '', $content);
                
                $questions = json_decode(trim($content), true);
                
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception('Invalid JSON received from AI: ' . json_last_error_msg());
                }

                return view('flashcards.play', [
                    'questions' => $questions,
                    'difficulty' => $difficulty
                ]);
            }

            throw new Exception('Groq API Error: ' . $response->status() . ' - ' . $response->body());

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
}