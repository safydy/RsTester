<?php


/**
 * Description of TableModel
 * Last modif : 20131119
 * @author R.Safidy
 */
define('CONST_DEFAULT_DATA',"");
define('CONST_DEFAULT_COLOR',"");
class TableModel {
    protected $RowKeys = array();
    protected $ColumnKeys = array();
    protected $RowName = "";
    protected $ColumnName = "";
    protected $Values = array();
    protected $CellColor = array();
    
    
    public function TableModel(array $RowKeys, array $ColumnKeys, $value = CONST_DEFAULT_DATA,$color=CONST_DEFAULT_COLOR){
        if(count($RowKeys)<1)
            throw new InvalidArgumentException( 'Number of Rows must be at least 1.' );
        if(count($ColumnKeys)<1)
            throw new InvalidArgumentException( 'Number of Column must be at least 1.' );
        $this->RowKeys = $RowKeys;
        $this->ColumnKeys = $ColumnKeys;
        $this->init($value,$color);
    }
    
    public function init($value = CONST_DEFAULT_DATA,$color=CONST_DEFAULT_COLOR){
        foreach ($this->getRowKeys() as $rowKey) {
            foreach($this->getColumnKeys() as $columnKey){
                $this->setValue($rowKey,$columnKey,$value);
                $this->setValue($rowKey,$columnKey,$color);
            }
        }
    }
    public function addRowKey($rowKey){
        $this->RowKeys[] = $rowKey;
        foreach ($this->getColumnKeys() as $columnKey) {
            $this->setValue($rowKey,$columnKey,CONST_DEFAULT_DATA);
        }
    }
    public function addColumnKey($columnKey){
        $this->ColumnKeys[] = $columnKey;
        foreach ($this->getRowKeys() as $rowKey) {
            $this->setValue($rowKey,$columnKey,CONST_DEFAULT_DATA);
        }
    }
    public function setValue($rowKey,$columnKey,$value){
            if(!in_array($rowKey, $this->getRowKeys(), false))
                    throw new OutOfRangeException( 'Row key "'.$rowKey.'" is not valid.' );
            if( !in_array($columnKey, $this->getColumnKeys(), false) )
                    throw new OutOfRangeException( 'Column key "'.$columnKey.'" is not valid.' );
            $this->Values[$rowKey][$columnKey] = $value;
    }
    
    public function getValue( $rowKey, $columnKey ){
            if(!in_array($rowKey, $this->getRowKeys(), false))
                    throw new OutOfRangeException( 'Row key "'.$rowKey.'" is not valid.' );
            if(!in_array($columnKey, $this->getColumnKeys(), false))
                    throw new OutOfRangeException( 'Column key "'.$columnKey.'" is not valid.' );
            return $this->Values[$rowKey][$columnKey];
    }  
    public function setColor($rowKey,$columnKey,$color){
            if(!in_array($rowKey, $this->getRowKeys(), false))
                    throw new OutOfRangeException( 'Row key "'.$rowKey.'" is not valid.' );
            if( !in_array($columnKey, $this->getColumnKeys(), false) )
                    throw new OutOfRangeException( 'Column key "'.$columnKey.'" is not valid.' );
            $this->CellColor[$rowKey][$columnKey] = $color;
    } 
    public function getColor( $rowKey, $columnKey ){
            if(!in_array($rowKey, $this->getRowKeys(), false))
                    throw new OutOfRangeException( 'Row key "'.$rowKey.'" is not valid.' );
            if(!in_array($columnKey, $this->getColumnKeys(), false))
                    throw new OutOfRangeException( 'Column key "'.$columnKey.'" is not valid.' );
            return $this->CellColor[$rowKey][$columnKey];
    }     
    public function getRowKeys() {
        return $this->RowKeys;
    }

    public function getColumnKeys() {
        return $this->ColumnKeys;
    }
    public function getRowName() {
        return $this->RowName;
    }

    public function setRowName($RowName) {
        $this->RowName = $RowName;
    }

    public function getColumnName() {
        return $this->ColumnName;
    }

    public function setColumnName($ColumnName) {
        $this->ColumnName = $ColumnName;
    }

    public function toArray(){
        return $this->Values;
    }
    public function toTable($class = "", $ShowKeys = false){
        $vHtml = "<table ".($class!=""?"class = ".$class:"border = '1'").">";
        if($ShowKeys){
            $vHtml .= "<tr>";
            $vHtml .= "<th>".($this->getRowName()!= ""?$this->getRowName():"")."</th>";
            foreach ($this->getColumnKeys() as $column) {                
                $vHtml .= "<th>".$column."</th>";
            }
            $vHtml .= "</tr>";
        }
        foreach ($this->getRowKeys() as $row){
                $vHtml .= "<tr>";
                if($ShowKeys)
                    $vHtml .= "<td>".$row."</td>";
                foreach ($this->getColumnKeys() as $column) {
                    $currentColor = $this->getColor($row, $column);
                    $vHtml .= "<td align='center' ".($currentColor === CONST_DEFAULT_COLOR?"":"style='background-color :$currentColor' ") .">".$this->getValue($row, $column)."</td>";
                }
                $vHtml .= "</tr>";
        }
        $vHtml .= "</table>";
        return $vHtml;        
    }        
}

?>
