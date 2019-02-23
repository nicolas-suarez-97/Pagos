<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\ColPeso;

class ColPeso extends Model
{
  protected $fillable = [
      'mount'
  ];
    public function users()
    {
      return $this
        ->belongsToMany('App\User')
        ->withTimestamps();
    }
    static public function transation($request, $id)
    {
      $mount = $request->input('mount');

      $fromUserId = $id;
      $toUserId = $request->input('userID');

      $fromUser = ColPeso::find($id);
      $toUser = ColPeso::where('user_id', $toUserId)->first();


      $fromMount = ($fromUser -> mount) + ($mount);
      $toMount = ($toUser -> mount) - ($mount);

      if ($toUser -> mount < $mount) {
        return 'Fondos insuficientes';
      }

      if ($mount < 0) {
        return 'No puedes enviar montos negativos';
      }

      if ($mount == 0) {
        return 'Cero no es un valor válido';
      }

      //Transation

      $fromUser->update([
        'mount' => $fromMount,
      ]);


      $toUser->update([
        'mount' => $toMount,
      ]);

      //end transation
      return 'Transacción realizada con exito';
    }
}
