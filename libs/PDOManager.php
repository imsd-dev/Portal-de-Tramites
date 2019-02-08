<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of PDOManager
 *
 * @author Ruth Escobar A.
 */
class PDOManager {

    private $link;

    public function __construct($DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {

        $this->link = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);

        try {
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->link->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function select($array, $data = null, $isUnique = false) {

        $sql = "SELECT " . $array['fields'] . " FROM " . $array['tables'];

        if (isset($array['join'])) {
            $sql = $sql . " INNER JOIN " . $array['join'];
        }

        if (isset($array['conditions'])) {
            $sql = $sql . " WHERE " . $array['conditions'];
        }

        if (isset($array['group'])) {
            $sql = $sql . " GROUP BY " . $array['group'];
        }

        if (isset($array['order'])) {
            $sql = $sql . " ORDER BY " . $array['order'];
        }

        if (isset($array['limit'])) {
            $sql = $sql . " LIMIT " . $array['limit'];
        }
        
        //echo $sql;

        try {
            $stmt = $this->link->prepare($sql);
            if ($data != null) {
                $stmt->execute($data);
            }else{
                $stmt->execute();
            }
            
            $resultSet = $stmt->fetchAll();

            if (($isUnique) && (!empty($resultSet))) {
                return (object) $resultSet[0];
            } else {
                return $resultSet;
            }
        } catch (PDOException $e) {
            return $e->getCode();
        } finally {
            $this->close($this->link, $stmt);
        }
    }

    function insert($table, $values, $getID = false, $getMsg = false) {

        $columnas_pre = null;
        $valores_pre = null;

        foreach ($values as $key => $value) {
            $columnas_pre .= $key . ',';
            $valores_pre .= '?, ';
            $data[] = $value;
        }

        $columnas = substr($columnas_pre, 0, -1);
        $valores = substr($valores_pre, 0, -2);

        $sql = "INSERT INTO " . $table . " (" . $columnas . ") VALUES(" . $valores . ")";

        try {
            $stmt = $this->link->prepare($sql);
            $stmt->execute($data);

            if ($getID) {
                $response = $this->link->lastInsertId();
            } else {
                $response = 'ok';
            }

            return $response;
        } catch (Exception $ex) {
            if ($getMsg) {
                return $ex->getMessage();
            } else {
                return $ex->getCode();
            }
        } finally {
            $this->close($this->link, $stmt);
        }
    }

    /**
     * Funcion encargada de actualizar datos en un una base de datos
     * 
     * @param string $table - Tabla que se quiere actualizar
     * @param array $values - array de valores de tipo clave => valor
     * @param string $conditions - Campo que se usara como condicion para actualizar 
     * el registro
     * @return string Retorna ok si todo salió bien, o el error en caso de que algo 
     * halla fallado.
     */
    function update($table, $values, $conditions) {

        $columnas = null;

        foreach ($values as $key => $value) {

            if ($value != null) {
                $columnas .= $key . ' = ?, ';
                $data[] = $value;
            }
        }

        $data[] = $values[$conditions];

        $columnas_f = substr($columnas, 0, strlen($columnas) - 2);
        $sql = "UPDATE $table SET $columnas_f WHERE $conditions = ?";

        try {
            $stmt = $this->link->prepare($sql);
            $stmt->execute($data);
            return "ok";
        } catch (Exception $ex) {
            return $ex->getMessage();
        } finally {
            $this->close($this->link, $stmt);
        }
    }

    function deletebyID($table, $campo, $id) {

        $sql = "DELETE FROM $table WHERE $campo = :id";

        try {
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return 'ok';
        } catch (Exception $ex) {
            return $ex->getCode();
        } finally {
            $this->close($this->link, $stmt);
        }
    }

    function close($conexion, $stm) {
        $stm->closeCursor();
        $conexion = null;
    }

}
