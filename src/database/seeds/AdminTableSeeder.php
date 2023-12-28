<?php

use App\Enums\AdminType;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Artisan;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('make:admin_roles');

        //Super
        //1
        $superAdmin = Admin::create([
            'name' => 'superadmin1',
            'email' => 'daisuke.homan@pr.cri.co.jp',
            'password' => '$2y$10$60odukZadmC8N3mFIdA19.dxZ0D50PrrB2b.t4yPU8qjWXlmYRqmC', // mmi2R,fX1+
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //2
        $superAdmin = Admin::create([
            'name' => 'superadmin2',
            'email' => 'd-homan@smc.sgn.ne.jp',
            'password' => '$2y$10$fMuv8S6iDDuGHGgrbvwXlOG8XQW/MdObWYcI6EhD2Mw172yYLcjSe', // &dw&mftDUq
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //3
        $superAdmin = Admin::create([
            'name' => 'superadmin3',
            'email' => 'y-kubota@smc.sgn.ne.jp',
            'password' => '$2y$10$ObKCYySNbqbdpKH3Nztp6Ol386YAQvg4M1upxRFMiQZWTKBTgoNRe', // @gz1uSctzj
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //4
        $superAdmin = Admin::create([
            'name' => 'superadmin4',
            'email' => 'y-kuroki@smc.sgn.ne.jp',
            'password' => '$2y$10$MJ/t0snJQzMUQsvZAdgYkOTmixM71e68WZhazAxfZMOHekArAklHW', // qc7vyNV6WE
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //5
        $superAdmin = Admin::create([
            'name' => 'superadmin5',
            'email' => 'm-wakabayashi@smc.sgn.ne.jp',
            'password' => '$2y$10$uWiLZvFS/PWoOHy20YTvcOCb5k9NGEZVGEE.VYxLFVlqfB0gWUxIm', // f-T*a*pW/Q
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //6
        $superAdmin = Admin::create([
            'name' => 'superadmin6',
            'email' => 'm-nonoyama@smc.sgn.ne.jp',
            'password' => '$2y$10$4xln/TFzpBFZBWBhbcRFG.8ZnCYRixE6/.T95bugCwU8Sd03X070C', // iYj4nduA5*
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //7
        $superAdmin = Admin::create([
            'name' => 'superadmin7',
            'email' => 'k-seta@smc.sgn.ne.jp',
            'password' => '$2y$10$Dt.ErgP0R1tcF422xejotenABvyZ2IRkmMCXXv/Sq7o6ZbJyJHjQm', // %Kyd(eEn2n
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);
        //予備
        $superAdmin = Admin::create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => '$2y$10$ZU4vm1WYapES5XWCEIkfYuKv/MQneomccK1zhKWW.8bJ5FwV2k656', // RJ&sPmMa3/nc`L]>
        ]);
        $superAdmin->assignRole(AdminType::SUPER_LEVEL);


        //Top
        //1
        $topAdmin = Admin::create([
            'name' => 'topadmin1',
            'email' => 'r-amada@smc.sgn.ne.jp',
            'password' => '$2y$10$uGNhmw.yW1Rn0yx8yYairuTHIvq9loXZ5.VNEgJLHFF4yeJz.RKMe', // @OwlxB2%gX
        ]);
        $topAdmin->assignRole(AdminType::TOP_LEVEL);
        //2
        $topAdmin = Admin::create([
            'name' => 'topadmin2',
            'email' => 'm-dai@smc.sgn.ne.jp',
            'password' => '$2y$10$kPpxVz70rFuoAjJU28q7hOKPdTI6/RvCTv/ydMaawPINUziXM9jtO', // ehRSv5gmV@
        ]);
        $topAdmin->assignRole(AdminType::TOP_LEVEL);


        //mid
        //1
        $midLevel = Admin::create([
            'name' => 'midadmin1',
            'email' => 's-mishima@smc.sgn.ne.jp',
            'password' => '$2y$10$MosONFOsFbNTTgswwLW63.A9l0kimtSncCEPjHBavWM3bfMW/WBQC', // z-dLP37m1d
        ]);
        $midLevel->assignRole(AdminType::MID_LEVEL);
        //2
        $midLevel = Admin::create([
            'name' => 'midadmin2',
            'email' => 'ma-hayashi@smc.sgn.ne.jp',
            'password' => '$2y$10$H1XICr2QIjiVBiO09doRQ.sD4ver75roOBarP1ZBPn2ZYHJFCyukq', // 3|e*%g.p~s
        ]);
        $midLevel->assignRole(AdminType::MID_LEVEL);
        //3
        $midLevel = Admin::create([
            'name' => 'midadmin3',
            'email' => 'n-kajita@smc.sgn.ne.jp',
            'password' => '$2y$10$Q40KRmjt6bIoGMmifpuzKuSJpCdZeK9BUKmQJqhHKSO8gaV0GZvwK', // %vGekJ~U(C
        ]);
        $midLevel->assignRole(AdminType::MID_LEVEL);
        //4
        $midLevel = Admin::create([
            'name' => 'midadmin4',
            'email' => 'a-takaya@smc.sgn.ne.jp',
            'password' => '$2y$10$hlFfffzZ6PjL8LqUX6LP2.1QeSiR1JHZ/mgqFhqkScGnYb.UERe6m', // 51eTW)Js.B
        ]);
        $midLevel->assignRole(AdminType::MID_LEVEL);


        //low
        //1
        $lowLevel = Admin::create([
            'name' => 'lowadmin1',
            'email' => 'a-ido@smc.sgn.ne.jp',
            'password' => '$2y$10$ogl7.71nbGjCnbvzqumyieOH5NV916czCbjrHU/cuaAJMt66f2ElO', // AIpbkN!j5Z
        ]);
        $lowLevel->assignRole(AdminType::LOW_LEVEL);
        //2
        $lowLevel = Admin::create([
            'name' => 'lowadmin2',
            'email' => 'd-muramoto@smc.sgn.ne.jp',
            'password' => '$2y$10$UjOeJrBqEXv/8O5LAFvjLeeh/1Od8iuoMx2rOWK6q3/BqI4GLRFzW', // MUUku3)uP(
        ]);
        $lowLevel->assignRole(AdminType::LOW_LEVEL);
        //3
        $lowLevel = Admin::create([
            'name' => 'lowadmin3',
            'email' => 'yu-inoue@smc.sgn.ne.jp',
            'password' => '$2y$10$k8KwO2udbMWECvTMGdhGp.w6gorSG9IKpHHOKF8pAtNwjNwZKN24i', // @OwlxB2%gX
        ]);
        $lowLevel->assignRole(AdminType::LOW_LEVEL);
        //4
        $lowLevel = Admin::create([
            'name' => 'lowadmin4',
            'email' => 'j-yoshii@smc.sgn.ne.jp',
            'password' => '$2y$10$uduGkJuF8QalJzlQanGbCei1EyCAWUbD6mBz8vNETsHF6NDcvWLVy', // fW-$&J6QKK
        ]);
        $lowLevel->assignRole(AdminType::LOW_LEVEL);
    }
}
