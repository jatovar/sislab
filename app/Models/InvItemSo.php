
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;


class InvItemSo extends Model{
    protected $table = 'Inv_item_so';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_item','id_so',];

    function item(){
        return $this->hasOne('App\Models\InvItem', 'id_item', 'id_item')->first();
    }

    function SO(){
        return $this->hasOne('App\Models\InvSo', 'id_so', 'id_so')->first();
    }
}
?>
