<?php

namespace App\Controllers;

use App\Models\NModelSelect;

class Cbdd extends BaseController
{
    public function testbdd()
    {
        $db = \Config\Database::connect();
        if ($db->connect()) {
            print_r('Listo mijin conectado');
        } else {
            print_r('Cambiese a gastronomia');
        }
    }

    public function Select_Controlador_bdd()
    {
        $datosesion = session('SecInfo');
        $instancia = new NModelSelect();
        $datosbdd = $instancia->Select_Modelo_Invetario();
        $data = [
            "keyselectbdd" => $datosbdd,
            "MensajeSesion" => $datosesion
        ];
        return view('vistainventario', $data);
    }

    public function Select_Controlador_usuario()
    {
        $datosesion = session('SecInfo');
        $instancia = new NModelSelect();
        $datosbdd = $instancia->Select_Modelo_Usuario();
        $data = [
            "keyselectbdd" => $datosbdd,
            "MensajeSesion" => $datosesion
        ];
        return view('vistausuario', $data);
    }

    public function Insertar_TblUsuario()
    {
        $instancia = new NModelSelect();
        $datospost = [
            'usu_nombre' => $_POST['Inp_Nombre'],
            'usu_apellido' => $_POST['Inp_Apellido'],
        ];
        $Verificacion = $instancia->Insert_SPTblUsuario($datospost);
        if ($Verificacion) {
            return redirect()->to(base_url().'usu')->with('SecInfo', '1');
        } else {
            return redirect()->to(base_url().'usu')->with('SecInfo', '0');
        }
    }

    public function Insertar_TblInventario()
    {
        $instancia = new NModelSelect();
        $datospost = [
            'inv_titulo' => $_POST['Inp_Titulo'],
            'inv_descripcion' => $_POST['Inp_Descripcion'],
        ];
        $Verificacion = $instancia->Insert_TblInventario($datospost);
        if ($Verificacion) {
            return redirect()->to(base_url().'inv')->with('SecInfo', '1');
        } else {
            return redirect()->to(base_url().'inv')->with('SecInfo', '0');
        }
    }
}
