<?php
class SplineChart extends UIChart {

    public string $id;
    protected array $data;

    public function __construct(string $id, array $data)
    {
        $this->id = $id;

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
        echo "
            <script>
var chart = c3.generate({
    data: {
        columns: ".$jsonString.",
        type: 'spline'
    },
    bindto: '#".$this->id."',
});
            </script>
        ";
    }
}
?>