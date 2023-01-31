<?

class ConciertoDAO extends FactoryBD implements DAO {

    public static function findAll() {
        $sql = "select * from concierto;";
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayConciertos = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayConciertos;
    }
    
    public static function findById($id) {
        $sql = "select * from concierto where id= ? ;";
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if($obj){
            return $obj;
        } else {
            return null;
        }
    }

    public static function findByDate($date) {
        $sql = "select * from concierto where fecha > ?;";
        $datos = array($date);
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayConciertos = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayConciertos;
    }

    public static function findOrderByDate($order) {
        $sql = "select * from concierto order by fecha ".$order.";";
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayConciertos = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayConciertos;
    }

    public static function findByDateOrder($date, $order) {
        $sql = "select * from concierto where fecha > '".$date."' order by fecha ".$order.";";
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayConciertos = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayConciertos;
    }
    
    public static function insert($objeto) {
        $sql = "insert into concierto values (?,?,?,?,?)";
        $objeto = (array)$objeto;
        $datos = array();
        foreach($objeto as $obj){
            array_push($datos, $obj);
        }
        $datos[0] = null;
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function update($obj) {
        $sql = "update concierto set grupo = ?, fecha = ?, precio = ?, lugar = ? where id = ?;";
        $datos = array($obj->grupo, $obj->fecha, $obj->precio, $obj->lugar, $obj->id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function delete($id) {
        $sql = "delete from concierto where id = ?;";
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function patch($id, $obj) {

        $datos = array($obj);
        foreach($datos as $campo => $objeto) {
            foreach($objeto as $camp => $valor) {
                    $campos[] = ''.$camp.' = ?';
                    $valores[] = $valor;
            }

        }
        $sql = "update concierto set ".join(', ', $campos)." where id = ".$id.";";
        $devuelve = parent::ejecuta($sql,$valores);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}

?>