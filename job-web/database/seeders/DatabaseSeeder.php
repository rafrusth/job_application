<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        Schema::disableForeignKeyConstraints();

        DB::table('role_based_qnas')->truncate();
        DB::table('generics')->truncate();
        DB::table('specifics')->truncate();
        DB::table('qnas')->truncate();
        DB::table('flashcards')->truncate();
        DB::table('list_of_companies')->truncate();
        DB::table('data_statistics')->truncate();
        DB::table('statistics')->truncate();
        DB::table('answer_cvs')->truncate();
        DB::table('cvs')->truncate();
        DB::table('user_specialties')->truncate();
        DB::table('sets_of_roles')->truncate();
        DB::table('scope_companies')->truncate();
        DB::table('location_companies')->truncate();
        DB::table('roles')->truncate();
        DB::table('sets')->truncate();
        DB::table('companies')->truncate();
        DB::table('users')->truncate();
        DB::table('cities')->truncate();

        Schema::enableForeignKeyConstraints();
        
        // 1. CITIES
        
        $cities = [
            ['name' => 'Jakarta',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Surabaya',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bandung',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Medan',       'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Semarang',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Yogyakarta',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Makassar',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bali',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Palembang',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Balikpapan',  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('cities')->insert($cities);

        
        // 2. USERS
        
        $users = [
            ['name' => 'Budi Santoso',    'password' => Hash::make('password'), 'type' => 'Software Engineer',   'email' => 'budi@email.com',    'phone_number' => '081100000001', 'city_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Siti Rahma',      'password' => Hash::make('password'), 'type' => 'Data Analyst',        'email' => 'siti@email.com',    'phone_number' => '081100000002', 'city_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Andi Wijaya',     'password' => Hash::make('password'), 'type' => 'UI/UX Designer',      'email' => 'andi@email.com',    'phone_number' => '081100000003', 'city_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dewi Lestari',    'password' => Hash::make('password'), 'type' => 'Product Manager',     'email' => 'dewi@email.com',    'phone_number' => '081100000004', 'city_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rizky Pratama',   'password' => Hash::make('password'), 'type' => 'QA Engineer',         'email' => 'rizky@email.com',   'phone_number' => '081100000005', 'city_id' => 5,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nur Fitriani',    'password' => Hash::make('password'), 'type' => 'Business Analyst',    'email' => 'nur@email.com',     'phone_number' => '081100000006', 'city_id' => 6,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hendra Kusuma',   'password' => Hash::make('password'), 'type' => 'HR Manager',          'email' => 'hendra@email.com',  'phone_number' => '081100000007', 'city_id' => 7,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Maya Putri',      'password' => Hash::make('password'), 'type' => 'Finance Analyst',     'email' => 'maya@email.com',    'phone_number' => '081100000008', 'city_id' => 8,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fajar Nugroho',   'password' => Hash::make('password'), 'type' => 'DevOps Engineer',     'email' => 'fajar@email.com',   'phone_number' => '081100000009', 'city_id' => 9,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laila Sari',      'password' => Hash::make('password'), 'type' => 'Marketing Specialist','email' => 'laila@email.com',   'phone_number' => '081100000010', 'city_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admin Tokopedia', 'password' => Hash::make('password'), 'type' => 'Software Engineer',   'email' => 'hr@tokopedia.com',  'phone_number' => '081100000011', 'city_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admin Gojek',     'password' => Hash::make('password'), 'type' => 'Product Manager',     'email' => 'hr@gojek.com',      'phone_number' => '081100000012', 'city_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admin Bukalapak', 'password' => Hash::make('password'), 'type' => 'Data Analyst',        'email' => 'hr@bukalapak.com',  'phone_number' => '081100000013', 'city_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admin Traveloka', 'password' => Hash::make('password'), 'type' => 'Business Analyst',    'email' => 'hr@traveloka.com',  'phone_number' => '081100000014', 'city_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admin Shopee',    'password' => Hash::make('password'), 'type' => 'Marketing Specialist','email' => 'hr@shopee.co.id',   'phone_number' => '081100000015', 'city_id' => 2,  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('users')->insert($users);

        
        // 3. COMPANIES
        
        $companies = [
            ['name' => 'PT Tokopedia',          'website' => 'www.tokopedia.com',     'contact' => '021-11110001', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Gojek',              'website' => 'www.gojek.com',         'contact' => '021-11110002', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Bukalapak',          'website' => 'www.bukalapak.com',     'contact' => '021-11110003', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Traveloka',          'website' => 'www.traveloka.com',     'contact' => '021-11110004', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Shopee Indonesia',   'website' => 'www.shopee.co.id',      'contact' => '021-11110005', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Telkom Indonesia',   'website' => 'www.telkom.co.id',      'contact' => '021-11110006', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Bank BCA',           'website' => 'www.bca.co.id',         'contact' => '021-11110007', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Astra International','website' => 'www.astra.co.id',       'contact' => '021-11110008', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Indofood',           'website' => 'www.indofood.co.id',    'contact' => '021-11110009', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PT Unilever Indonesia', 'website' => 'www.unilever.co.id',    'contact' => '021-11110010', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('companies')->insert($companies);

        
        // 4. SETS
        
        $sets = [
            ['name' => 'Technology',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Finance',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Healthcare',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Retail',         'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Education',      'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Manufacturing',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Logistics',      'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Media',          'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('sets')->insert($sets);

        
        // 5. ROLES
        
        $roles = [
            ['name' => 'Software Engineer',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Analyst',           'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Manager',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'UI/UX Designer',         'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DevOps Engineer',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'QA Engineer',            'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Analyst',       'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HR Manager',             'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Finance Analyst',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing Specialist',   'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('roles')->insert($roles);

        
        // 6. LOCATION_COMPANIES (composite PK: id, company_id, city_id)
        
        $locationCompanies = [
            ['company_id' => 1, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 1, 'city_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 2, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 2, 'city_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 3, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 4, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 4, 'city_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 5, 'city_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 6, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 6, 'city_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 7, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 7, 'city_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 8, 'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 9, 'city_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 10,'city_id' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('location_companies')->insert($locationCompanies);

        
        // 7. SCOPE_COMPANIES (composite PK: id, company_id, set_id)
        
        $scopeCompanies = [
            ['company_id' => 1,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 1,  'set_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 2,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 2,  'set_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 3,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 3,  'set_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 4,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 4,  'set_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 5,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 5,  'set_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 6,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 7,  'set_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 8,  'set_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 9,  'set_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['company_id' => 10, 'set_id' => 3, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('scope_companies')->insert($scopeCompanies);

        
        // 8. SETS_OF_ROLES (composite PK: id, role_id, set_id)
        
        $setsOfRoles = [
            ['role_id' => 1,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 2,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 3,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 4,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 5,  'set_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 6,  'set_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 7,  'set_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 9,  'set_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 8,  'set_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 10, 'set_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 1,  'set_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 2,  'set_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 3,  'set_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 4,  'set_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => 5,  'set_id' => 3, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('sets_of_roles')->insert($setsOfRoles);

        
        // 9. USER_SPECIALTIES (composite PK: id, user_id, role_id)
        
        $userSpecialties = [
            ['user_id' => 1,  'role_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 1,  'role_id' => 5,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 2,  'role_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 3,  'role_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 4,  'role_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 5,  'role_id' => 6,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 6,  'role_id' => 7,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 7,  'role_id' => 8,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 8,  'role_id' => 9,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 9,  'role_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 10, 'role_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 10, 'role_id' => 2,  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('user_specialties')->insert($userSpecialties);

        
        // 10. CVS
        
        $cvs = [
            ['user_id' => 1,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 2,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 3,  'status' => 'draft',    'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 4,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 5,  'status' => 'inactive', 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 6,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 7,  'status' => 'draft',    'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 8,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 9,  'status' => 'active',   'created_at' => $now, 'updated_at' => $now],
            ['user_id' => 10, 'status' => 'inactive', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('cvs')->insert($cvs);

        
        // 11. ANSWER_CVS (composite PK: id, cv_id)
        
        $answerCvs = [
            [
                'cv_id'      => 1,
                'experience' => '3 tahun sebagai Backend Developer di startup fintech. Mengerjakan REST API dengan Laravel dan Node.js.',
                'education'  => 'S1 Teknik Informatika, Universitas Indonesia, 2018-2022.',
                'skill'      => 'PHP, Laravel, Node.js, MySQL, Redis, Docker',
                'project'    => 'Sistem pembayaran digital, integrasi payment gateway Midtrans.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 2,
                'experience' => '2 tahun sebagai Data Analyst di perusahaan e-commerce. Membuat dashboard laporan penjualan harian.',
                'education'  => 'S1 Statistika, Institut Teknologi Bandung, 2019-2023.',
                'skill'      => 'Python, Pandas, SQL, Tableau, Power BI',
                'project'    => 'Dashboard analitik real-time penjualan menggunakan Tableau.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 3,
                'experience' => '1 tahun sebagai Junior UI/UX Designer di agency digital.',
                'education'  => 'S1 Desain Komunikasi Visual, Universitas Trisakti, 2020-2024.',
                'skill'      => 'Figma, Adobe XD, Sketch, Prototyping, User Research',
                'project'    => null,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 4,
                'experience' => '4 tahun sebagai Product Manager di perusahaan SaaS B2B.',
                'education'  => 'S1 Manajemen Bisnis, Universitas Gadjah Mada, 2016-2020.',
                'skill'      => 'Roadmapping, Scrum, Jira, OKR, Data-driven decision making',
                'project'    => 'Peluncuran produk ERP untuk segmen UMKM, meningkatkan retention 40%.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 5,
                'experience' => '2 tahun sebagai QA Engineer, pengujian aplikasi mobile dan web.',
                'education'  => 'S1 Sistem Informasi, Universitas Diponegoro, 2019-2023.',
                'skill'      => 'Selenium, Postman, JMeter, Manual Testing, Bug Tracking',
                'project'    => null,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 6,
                'experience' => '3 tahun sebagai Business Analyst di perusahaan konsultan IT.',
                'education'  => 'S1 Teknik Industri, Universitas Brawijaya, 2018-2022.',
                'skill'      => 'BPMN, Use Case, Requirement Gathering, SQL, Visio',
                'project'    => 'Analisis dan dokumentasi kebutuhan sistem ERP untuk klien manufaktur.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 7,
                'experience' => '5 tahun sebagai HR Manager di perusahaan multinasional.',
                'education'  => 'S1 Psikologi, Universitas Airlangga, 2015-2019.',
                'skill'      => 'Rekrutmen, Talent Management, HRIS, Payroll, Labor Law',
                'project'    => null,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 8,
                'experience' => '3 tahun sebagai Finance Analyst di perusahaan perbankan.',
                'education'  => 'S1 Akuntansi, Universitas Padjadjaran, 2018-2022.',
                'skill'      => 'Financial Modeling, Excel, SAP, IFRS, Risk Analysis',
                'project'    => 'Penyusunan laporan keuangan konsolidasi anak perusahaan.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 9,
                'experience' => '2 tahun sebagai Marketing Specialist di perusahaan FMCG.',
                'education'  => 'S1 Ilmu Komunikasi, Universitas Hasanuddin, 2020-2024.',
                'skill'      => 'Digital Marketing, SEO/SEM, Meta Ads, Google Ads, Content Strategy',
                'project'    => 'Kampanye digital peluncuran produk baru, ROAS 4.5x.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'cv_id'      => 10,
                'experience' => '1 tahun sebagai Junior Software Engineer, fresh graduate.',
                'education'  => 'S1 Teknik Informatika, Universitas Sriwijaya, 2020-2024.',
                'skill'      => 'Java, Spring Boot, Git, MySQL, REST API',
                'project'    => 'Aplikasi manajemen inventaris toko berbasis web sebagai capstone project.',
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];
        DB::table('answer_cvs')->insert($answerCvs);

        
        // 12. STATISTICS
        
        $statistics = [
            ['name' => 'Statistik Q1 2024', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Statistik Q2 2024', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Statistik Q3 2024', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Statistik Q4 2024', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Statistik Q1 2025', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('statistics')->insert($statistics);

        
        // 13. DATA_STATISTICS
        
        $dataStatistics = [
            ['applicant' => 320, 'open_hire' => 15, 'reject' => 280, 'employment' => 40,  'statistic_id' => 1, 'role_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 210, 'open_hire' => 10, 'reject' => 185, 'employment' => 25,  'statistic_id' => 1, 'role_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 150, 'open_hire' => 8,  'reject' => 130, 'employment' => 20,  'statistic_id' => 1, 'role_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 180, 'open_hire' => 12, 'reject' => 155, 'employment' => 25,  'statistic_id' => 2, 'role_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 95,  'open_hire' => 6,  'reject' => 80,  'employment' => 15,  'statistic_id' => 2, 'role_id' => 5,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 130, 'open_hire' => 9,  'reject' => 110, 'employment' => 20,  'statistic_id' => 2, 'role_id' => 6,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 175, 'open_hire' => 11, 'reject' => 150, 'employment' => 25,  'statistic_id' => 3, 'role_id' => 7,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 90,  'open_hire' => 5,  'reject' => 78,  'employment' => 12,  'statistic_id' => 3, 'role_id' => 8,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 120, 'open_hire' => 7,  'reject' => 105, 'employment' => 15,  'statistic_id' => 3, 'role_id' => 9,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 200, 'open_hire' => 13, 'reject' => 170, 'employment' => 30,  'statistic_id' => 4, 'role_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 350, 'open_hire' => 18, 'reject' => 310, 'employment' => 40,  'statistic_id' => 4, 'role_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 225, 'open_hire' => 11, 'reject' => 200, 'employment' => 25,  'statistic_id' => 4, 'role_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 160, 'open_hire' => 9,  'reject' => 140, 'employment' => 20,  'statistic_id' => 5, 'role_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 190, 'open_hire' => 13, 'reject' => 162, 'employment' => 28,  'statistic_id' => 5, 'role_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['applicant' => 100, 'open_hire' => 7,  'reject' => 85,  'employment' => 15,  'statistic_id' => 5, 'role_id' => 5,  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('data_statistics')->insert($dataStatistics);

        
        // 14. LIST_OF_COMPANIES (composite PK: id, data_statistic_id, company_id)
        
        $listOfCompanies = [
            ['data_statistic_id' => 1,  'company_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 1,  'company_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 2,  'company_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 2,  'company_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 3,  'company_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 4,  'company_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 5,  'company_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 6,  'company_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 7,  'company_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 8,  'company_id' => 9, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 9,  'company_id' => 10,'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 10, 'company_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 11, 'company_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 11, 'company_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 12, 'company_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 12, 'company_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 13, 'company_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 14, 'company_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 15, 'company_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['data_statistic_id' => 15, 'company_id' => 9, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('list_of_companies')->insert($listOfCompanies);

        
        // 15. FLASHCARDS
        
        $flashcards = [];
        for ($i = 1; $i <= 20; $i++) {
            $flashcards[] = ['created_at' => $now, 'updated_at' => $now];
        }
        DB::table('flashcards')->insert($flashcards);

        
        // 16. QNAS (id = FK ke flashcards.id, type: 'specific'|'generic')
        
        $qnas = [
            // specific (id 1-10)
            ['id' => 1,  'question' => 'Jelaskan perbedaan antara REST dan GraphQL!',                            'answer' => 'REST menggunakan endpoint terpisah per resource, sedangkan GraphQL menggunakan satu endpoint dengan query fleksibel dari client.',       'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2,  'question' => 'Apa itu SOLID principle dalam OOP?',                                    'answer' => 'SOLID adalah 5 prinsip desain OOP: Single Responsibility, Open/Closed, Liskov Substitution, Interface Segregation, Dependency Inversion.','type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3,  'question' => 'Bagaimana cara kerja indexing pada database?',                          'answer' => 'Index membuat struktur data tambahan (B-tree/hash) sehingga query pencarian tidak perlu full table scan, mempercepat SELECT namun memperlambat INSERT/UPDATE.','type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4,  'question' => 'Apa perbedaan supervised dan unsupervised learning?',                   'answer' => 'Supervised learning menggunakan data berlabel untuk melatih model, sedangkan unsupervised learning mencari pola dari data tanpa label.',   'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5,  'question' => 'Apa yang dimaksud dengan Design Thinking?',                             'answer' => 'Design Thinking adalah pendekatan iteratif untuk memecahkan masalah berpusat pada pengguna: Empathize, Define, Ideate, Prototype, Test.',  'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6,  'question' => 'Jelaskan konsep CI/CD dalam DevOps!',                                   'answer' => 'CI (Continuous Integration) adalah praktik merge kode secara rutin dengan automated testing; CD (Continuous Delivery/Deployment) mengotomasi proses rilis ke production.','type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7,  'question' => 'Apa itu regression testing?',                                           'answer' => 'Regression testing adalah pengujian ulang fitur yang sudah ada setelah perubahan kode baru, memastikan tidak ada fungsionalitas yang rusak.', 'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8,  'question' => 'Apa yang dimaksud dengan user story dalam Agile?',                      'answer' => 'User story adalah deskripsi singkat fitur dari perspektif pengguna akhir, format: "Sebagai [user], saya ingin [aksi] agar [manfaat]".',      'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9,  'question' => 'Jelaskan perbedaan job evaluation dan job grading!',                    'answer' => 'Job evaluation menilai bobot suatu pekerjaan relatif terhadap pekerjaan lain; job grading mengelompokkan pekerjaan ke dalam tingkatan berdasarkan hasil evaluasi.','type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'question' => 'Apa yang dimaksud dengan working capital?',                             'answer' => 'Working capital adalah selisih antara aset lancar dan liabilitas lancar, mengukur kemampuan perusahaan memenuhi kewajiban jangka pendek.',  'type' => 'specific', 'created_at' => $now, 'updated_at' => $now],
            // generic (id 11-20)
            ['id' => 11, 'question' => 'Ceritakan tentang diri Anda!',                                          'answer' => 'Perkenalkan diri secara singkat, padat, dan relevan dengan posisi yang dilamar. Fokus pada pengalaman, skill, dan motivasi.',               'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'question' => 'Apa kelebihan dan kekurangan Anda?',                                    'answer' => 'Sebutkan kelebihan yang relevan dengan pekerjaan dan kekurangan yang sudah Anda sadari dan sedang Anda kembangkan.',                     'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'question' => 'Mengapa Anda melamar posisi ini?',                                      'answer' => 'Jelaskan motivasi berdasarkan kesesuaian skill, minat terhadap industri, dan kontribusi yang bisa Anda berikan.',                       'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'question' => 'Di mana Anda melihat diri Anda 5 tahun ke depan?',                      'answer' => 'Sampaikan ambisi karir yang realistis dan relevan dengan perusahaan, menunjukkan komitmen jangka panjang.',                             'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'question' => 'Bagaimana cara Anda menghadapi tekanan atau deadline ketat?',            'answer' => 'Berikan contoh nyata bagaimana Anda memprioritaskan tugas, berkomunikasi dengan tim, dan tetap produktif di bawah tekanan.',            'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'question' => 'Ceritakan konflik yang pernah Anda alami di tempat kerja dan solusinya!','answer' => 'Gunakan metode STAR (Situation, Task, Action, Result) untuk menjelaskan konflik dan bagaimana Anda menyelesaikannya secara profesional.','type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'question' => 'Mengapa Anda meninggalkan pekerjaan sebelumnya?',                       'answer' => 'Jawab secara jujur namun profesional, hindari menyalahkan mantan perusahaan. Fokus pada pertumbuhan dan peluang baru.',                 'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'question' => 'Berapa ekspektasi gaji Anda?',                                          'answer' => 'Riset range gaji pasar untuk posisi tersebut, sampaikan range yang realistis berdasarkan pengalaman dan skill Anda.',                   'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'question' => 'Apa yang Anda ketahui tentang perusahaan kami?',                        'answer' => 'Riset produk, visi misi, budaya, dan pencapaian perusahaan. Tunjukkan antusiasme dan keselarasan nilai.',                              'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'question' => 'Apakah ada pertanyaan untuk kami?',                                     'answer' => 'Selalu siapkan pertanyaan: tentang growth opportunity, budaya kerja, atau ekspektasi di 30-60-90 hari pertama.',                       'type' => 'generic',  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('qnas')->insert($qnas);

        
        // 17. SPECIFICS (id = FK ke qnas.id, hanya yang type='specific')
        
        $specifics = [];
        for ($i = 1; $i <= 10; $i++) {
            $specifics[] = ['id' => $i, 'created_at' => $now, 'updated_at' => $now];
        }
        DB::table('specifics')->insert($specifics);

        
        // 18. GENERICS (id = FK ke qnas.id, hanya yang type='generic')
        
        $generics = [];
        for ($i = 11; $i <= 20; $i++) {
            $generics[] = ['id' => $i, 'created_at' => $now, 'updated_at' => $now];
        }
        DB::table('generics')->insert($generics);

        
        // 19. ROLE_BASED_QNAS (composite PK: id, role_id, specific_id)
        
        $roleBasedQnas = [
            ['role_id' => 1,  'specific_id' => 1,  'created_at' => $now, 'updated_at' => $now], // SE  -> REST vs GraphQL
            ['role_id' => 1,  'specific_id' => 2,  'created_at' => $now, 'updated_at' => $now], // SE  -> SOLID
            ['role_id' => 1,  'specific_id' => 3,  'created_at' => $now, 'updated_at' => $now], // SE  -> DB Indexing
            ['role_id' => 2,  'specific_id' => 4,  'created_at' => $now, 'updated_at' => $now], // DA  -> ML supervised
            ['role_id' => 2,  'specific_id' => 3,  'created_at' => $now, 'updated_at' => $now], // DA  -> DB Indexing
            ['role_id' => 3,  'specific_id' => 8,  'created_at' => $now, 'updated_at' => $now], // PM  -> user story
            ['role_id' => 3,  'specific_id' => 5,  'created_at' => $now, 'updated_at' => $now], // PM  -> design thinking
            ['role_id' => 4,  'specific_id' => 5,  'created_at' => $now, 'updated_at' => $now], // UX  -> design thinking
            ['role_id' => 5,  'specific_id' => 6,  'created_at' => $now, 'updated_at' => $now], // DevOps -> CI/CD
            ['role_id' => 5,  'specific_id' => 1,  'created_at' => $now, 'updated_at' => $now], // DevOps -> REST
            ['role_id' => 6,  'specific_id' => 7,  'created_at' => $now, 'updated_at' => $now], // QA  -> regression testing
            ['role_id' => 7,  'specific_id' => 8,  'created_at' => $now, 'updated_at' => $now], // BA  -> user story
            ['role_id' => 8,  'specific_id' => 9,  'created_at' => $now, 'updated_at' => $now], // HR  -> job evaluation
            ['role_id' => 9,  'specific_id' => 10, 'created_at' => $now, 'updated_at' => $now], // Finance -> working capital
            ['role_id' => 10, 'specific_id' => 5,  'created_at' => $now, 'updated_at' => $now], // Marketing -> design thinking
        ];
        DB::table('role_based_qnas')->insert($roleBasedQnas);
    }
}