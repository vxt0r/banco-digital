<?php

namespace app\models;
use MF\model\Model;

class Conta extends Model{

    public function getConta($id_usuario){
        $query = '  SELECT nome,numero,saldo FROM conta 
                    INNER JOIN usuarios ON id_usuario = usuarios.id
                    WHERE id_usuario = ?';
        $stmt= $this->db->prepare($query);
        $stmt->bindValue(1,$id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function atualizarSaldo($saldo,$id_usuario){
        $query = 'UPDATE conta SET saldo = ? WHERE id_usuario = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$saldo);
        $stmt->bindValue(2,$id_usuario);
        $stmt->execute();
        header('location:/');
    }

    public function depositar($valor,$id_usuario){
        $saldo = $this->getConta($id_usuario)[0]['saldo'];
        $saldo += (float)$valor;
        $this->atualizarSaldo($saldo,$id_usuario);
    }

    public function sacar($valor,$id_usuario){
        $saldo = $this->getConta($id_usuario)[0]['saldo'];
        $valor = (float) $valor;
        if($valor <= $saldo){
            $saldo -= $valor;
            $this->atualizarSaldo($saldo,$id_usuario); 
        }
        else 
            return 'Não é possível sacar essa quantia. Saldo insuficiente';
    }
}