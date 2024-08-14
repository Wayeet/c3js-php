<?php
class BarChart extends UIChart {

    public string $id;
    private array $data;
    private bool $showToolTip;

    public function __construct(string $id, array $data, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;

        //FORMAT von $data
        // $data = [
        //     ['data1', 0,0,0,0,0,0,0],
        //     ['data2', 0,0,0,0,0,0,0]
        // ];
        $this->data = $data;
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
                    columns: ".$jsonString.",
                    type: 'bar'
                },
                bindto: '#".$this->id."',
                tooltip: {show: ".$jsonShowString."}
            });
            </script>
        ";
    }
}
?>