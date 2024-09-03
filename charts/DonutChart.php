<?php
/**
 * Represents a DonutChart (https://c3js.org/samples/chart_donut.html)
 */
class DonutChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;
    public string $title;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/chart_donut.html
     * @param string $innerTitle The title in the middle of the chart
     * @param bool $showToolTip Whether to show a tooltip on the chart (default=false)
     */
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