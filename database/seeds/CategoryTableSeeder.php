<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $categories =  array(
        array('id' => '139','name' => 'Фризьор','_lft' => '1','_rgt' => '60','parent_id' => NULL),
        array('id' => '140','name' => 'Маникюр','_lft' => '61','_rgt' => '82','parent_id' => NULL),
        array('id' => '141','name' => 'Козметика','_lft' => '83','_rgt' => '98','parent_id' => NULL),
        array('id' => '142','name' => 'Масажи','_lft' => '99','_rgt' => '112','parent_id' => NULL),
        array('id' => '146','name' => 'Масаж','_lft' => '100','_rgt' => '101','parent_id' => '142'),
        array('id' => '151','name' => 'Мaникюр','_lft' => '64','_rgt' => '65','parent_id' => '140'),
        array('id' => '152','name' => 'Декориране','_lft' => '66','_rgt' => '67','parent_id' => '140'),
        array('id' => '153','name' => 'Лакиране','_lft' => '68','_rgt' => '69','parent_id' => '140'),
        array('id' => '154','name' => 'Изграждане','_lft' => '70','_rgt' => '71','parent_id' => '140'),
        array('id' => '155','name' => 'Педикюр','_lft' => '72','_rgt' => '73','parent_id' => '140'),
        array('id' => '156','name' => 'Грижа за лице','_lft' => '86','_rgt' => '87','parent_id' => '141'),
        array('id' => '157','name' => 'Терапии за лице','_lft' => '88','_rgt' => '89','parent_id' => '141'),
        array('id' => '160','name' => 'Koла маска','_lft' => '92','_rgt' => '93','parent_id' => '141'),
        array('id' => '161','name' => 'Кола маска','_lft' => '94','_rgt' => '95','parent_id' => '141'),
        array('id' => '163','name' => 'Мaсаж','_lft' => '104','_rgt' => '105','parent_id' => '142'),
        array('id' => '164','name' => 'Терапия','_lft' => '106','_rgt' => '107','parent_id' => '142'),
        array('id' => '165','name' => 'Подстригване','_lft' => '14','_rgt' => '15','parent_id' => '139'),
        array('id' => '166','name' => 'Сешоар','_lft' => '16','_rgt' => '17','parent_id' => '139'),
        array('id' => '167','name' => 'Подстригване + сешоар','_lft' => '18','_rgt' => '19','parent_id' => '139'),
        array('id' => '168','name' => 'Делова прическа','_lft' => '20','_rgt' => '21','parent_id' => '139'),
        array('id' => '169','name' => 'Официална прическа','_lft' => '22','_rgt' => '23','parent_id' => '139'),
        array('id' => '170','name' => 'Изправяне  преса','_lft' => '24','_rgt' => '25','parent_id' => '139'),
        array('id' => '171','name' => 'Навиване с маша','_lft' => '26','_rgt' => '27','parent_id' => '139'),
        array('id' => '172','name' => 'Боядисване с JungleFever','_lft' => '28','_rgt' => '29','parent_id' => '139'),
        array('id' => '173','name' => 'Боядисване с O WAY','_lft' => '30','_rgt' => '31','parent_id' => '139'),
        array('id' => '174','name' => 'Боядисване с Evolution','_lft' => '32','_rgt' => '33','parent_id' => '139'),
        array('id' => '175','name' => 'Боядисване с BES HI FI','_lft' => '34','_rgt' => '35','parent_id' => '139'),
        array('id' => '176','name' => 'Боядисване за мъже','_lft' => '36','_rgt' => '37','parent_id' => '139'),
        array('id' => '177','name' => 'Кичури с шапка','_lft' => '38','_rgt' => '39','parent_id' => '139'),
        array('id' => '178','name' => 'Кичури с филио','_lft' => '40','_rgt' => '41','parent_id' => '139'),
        array('id' => '179','name' => 'Трайно изправяне','_lft' => '42','_rgt' => '43','parent_id' => '139'),
        array('id' => '180','name' => 'Къдрене с безамонячен къдрин','_lft' => '44','_rgt' => '45','parent_id' => '139'),
        array('id' => '181','name' => 'Грим','_lft' => '113','_rgt' => '130','parent_id' => NULL),
        array('id' => '182','name' => 'Гримиране','_lft' => '126','_rgt' => '127','parent_id' => '181'),
        array('id' => '183','name' => 'Юмейхо терапия','_lft' => '108','_rgt' => '109','parent_id' => '142')
    );

    public function run()
    {
        foreach($this->categories as $category){
            \App\Category::create($category);
        }
    }
}
