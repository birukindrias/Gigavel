<?php
namespace App\App\models;

use App\config\Model;
class Neww extends Model 
{
  

    public static function tableName(): string
    {
        return "newws";
    }
    public function rules(): array
    {
        return [
          "neww"=> [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
           

        ];
    }
      
}
