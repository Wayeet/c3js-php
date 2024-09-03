<?php
namespace C3Charts;

/**
 * Represents a SplineChart (https://c3js.org/samples/chart_spline.html)
 */
class SplineChart extends UIChart {

    public string $id;
    protected array $data;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/simple_multiple.html
     */
    public function __construct(string $id, array $data)
    {
        $this->id = $id;
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