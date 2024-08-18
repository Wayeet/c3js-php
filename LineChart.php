<?php
class LineChart extends UIChart {

    public string $id;
    private array $data;
    private bool $showToolTip;

    public function __construct(string $id, array $data, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;

        //FORMAT von $data
        // $data = [
        //     ['data1', 30, 200, 100, 400, 150, 250],
        //     ['data2', 50, 20, 10, 40, 15, 25]
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
    },
    bindto: '#".$this->id."'
});
            </script>
        ";
    }
}
?>