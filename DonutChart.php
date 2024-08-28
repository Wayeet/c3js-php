<?php
class DonutChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;
    public string $title;

    public function __construct(string $id, array $data, string $innerTitle, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;

        //FORMAT von $data
        // $data = [
        //     ['data1', 81.5],
        //     ['data2', 18.5]
        // ];
        $this->data = $data;
        $this->title = $innerTitle;
    }

    public function preRender(){
        echo '<div id="'.$this->id.'"></div>';
    }
    
    public function render() {
        $jsonString = json_encode($this->data, JSON_PRETTY_PRINT);
        $jsonShowString = json_encode($this->showToolTip);
        echo "
            <script>
var chart = c3.generate({
    data: {
        columns: ".$jsonString.",
        type : 'donut',
    },
    donut: {
        title: '".$this->title."'
    },
    bindto: '#".$this->id."',
    tooltip: {
        format: {
            value: function (name, ratio, id, index) {
                var gerundet = Math.round(ratio * 10000) / 10000;
                return (gerundet*100).toFixed(2) + '%';
            }
        }
    }
});
            </script>
        ";
    }
}
?>