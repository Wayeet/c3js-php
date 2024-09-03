<?php
/**
 * Represents a TimeseriesChart (https://c3js.org/samples/timeseries.html)
 */
class TimeseriesChart extends UIChart {

    public string $id;
    public array $data;
    public string $timeRowNameInData;
    public string $timeRowFormat;
    public string $dateDisplayFormat;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/timeseries.html
     * @param string $timeRowNameInData The row call that is the timerow like in chart.data.x -> https://c3js.org/samples/timeseries.html
     * @param string $timeRowFormat Custom format of the x axis lime in chart.data.xFormat -> https://c3js.org/samples/timeseries.html
     * @param string $dateDisplayFormat The date format for e.g. "%Y-%m-%d" like in chart.axis.x.tick.format -> https://c3js.org/samples/timeseries.html
     */
    public function __construct(string $id, array $data, string $timeRowNameInData, string $timeRowFormat, string $dateDisplayFormat)
    {
        $this->id = $id;
        $this->timeRowNameInData = $timeRowNameInData;
        $this->data = $data;
        $this->timeRowFormat = $timeRowFormat;
        $this->dateDisplayFormat = $dateDisplayFormat;
    }
    /**
     * Renders the charts wrapper-element
     * @return void
     */
    public function preRender(){
        echo '<div id="'.$this->id.'"></div>';
    }
    /**
     * Render the chart to the wrapper
     * @return void
     */    
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