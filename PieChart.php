<?php
class PieChart extends UIChart {

    public string $id;
    private array $data;
    private bool $showToolTip;

    public function __construct(string $id, array $data, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;

        //FORMAT von $data
        // $data = [
        //     ['data1', 81.5],
        //     ['data2', 18.5]
        // ];
        $this->data = $data;
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
                    type : 'pie',
                    columns: ".$jsonString."
                },
                bindto: '#".$this->id."',
                tooltip: {
                    show: ".$jsonShowString.",
                }
            });
            </script>
        ";
    }
}
?>