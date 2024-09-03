<?php
/**
 * Represents a LineChart (https://c3js.org/samples/simple_multiple.html)
 */
class LineChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/simple_multiple.html
     * @param bool $showToolTip Whether to show a tooltip on the chart (default=false)
     */
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