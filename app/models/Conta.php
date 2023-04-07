<?php

namespace app\models;
use MF\model\Model;

class Conta extends Model{

    public function getConta(int $id_usuario):array{
        $query = '  SELECT nome,numero,saldo FROM conta
                    INNER JOIN usuario ON id_usuario = usuario.id
                    WHERE id_usuario = ?';
        $stmt= $this->db->prepare($query);
        $stmt->bindValue(1,$id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function atualizarSaldo(float $saldo,int $id_usuario):void{
        $query = 'UPDATE conta SET saldo = ? WHERE id_usuario = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$saldo);
        $stmt->bindValue(2,$id_usuario);
        $stmt->execute();
        header('location:/');
    }

    public function depositar(float $valor, int $id_usuario):void{
        $saldo = $this->getConta($id_usuario)[0]['saldo'];
        $saldo += $valor;
        $this->atualizarSaldo($saldo,$id_usuario);
    }

    public function sacar(float $valor,int $id_usuario):string{
        $saldo = $this->getConta($id_usuario)[0]['saldo'];
        if($valor <= $saldo){
            $saldo -= $valor;
            $this->atualizarSaldo($saldo,$id_usuario);
            return '';
        }
        else
            return 'Não é possível sacar essa quantia. Saldo insuficiente';
    }
}
