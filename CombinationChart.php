<?php
class CombinationChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;
    public string $diffTypes;
    public string $mainType;

    public function __construct(string $id, array $data, string $mainType, string $diffTypes, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;
        $this->data = $data;
        $this->diffTypes = $diffTypes;
        $this->mainType = $mainType;
    }

    public function preRender(){
        echo '<div id="'.$this->id.'"></div>';
    }
    
    public function render() {
        $jsonString = json_encode($this->data);
        $jsonShowString = json_encode($this->showToolTip);
        echo "
            <script>
            var chart = c3.generate({
                data: {
                    columns: $jsonString,
                    type: '".$this->mainType."',
                    types: ".$this->diffTypes."
                },
                bindto: '#".$this->id."',
                tooltip: {show: ".$jsonShowString."}
            });
            </script>
        ";
    }
}
?>