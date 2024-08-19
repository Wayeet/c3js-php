<?php
class TimeseriesChart extends UIChart {

    public string $id;
    private array $data;
    private string $timeRowNameInData;
    private string $timeRowFormat;
    private string $dateDisplayFormat;

    public function __construct(string $id, array $data, string $timeRowNameInData, string $timeRowFormat, string $dateDisplayFormat)
    {
        $this->id = $id;
        $this->timeRowNameInData = $timeRowNameInData;
        $this->data = $data;
        $this->timeRowFormat = $timeRowFormat;
        $this->dateDisplayFormat = $dateDisplayFormat;
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
        x: '".$this->timeRowNameInData."',
        xFormat: '".$this->timeRowFormat."',
        columns: ".$jsonString.",
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '".$this->dateDisplayFormat."'
            }
        }
    },
    bindto: '#".$this->id."'
});
            </script>
        ";
    }
}
?>