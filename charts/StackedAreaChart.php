<?php
/**
 * Represents a StackedAreaChart (https://c3js.org/samples/chart_area_stacked.html)
 */
class StackedAreaChart extends UIChart {

    public string $id;
    public array $data;
    public array $groups; 

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/chart_area_stacked.html
     * @param array $groups The Data-Groups like shown in chart.data.groups -> https://c3js.org/samples/chart_area_stacked.html
     */
    public function __construct(string $id, array $data, array $groups)
    {
        $this->id = $id;

        //[['data1', 'data2']]
        $this->groups = $groups;

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
        $jsonGroups = json_encode($this->groups);
        echo "
            <script>
var chart = c3.generate({
    data: {
        columns: ".$jsonString.",
        types: {
            data1: 'area-spline',
            data2: 'area-spline'
        },
        groups: ".$jsonGroups."
    },
    bindto: '#".$this->id."'
});
            </script>
        ";
    }
}
?>