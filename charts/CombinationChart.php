<?php
/**
 * Represents a CombinationChart (https://c3js.org/samples/chart_combination.html)
 */
class CombinationChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;
    public string $diffTypes;
    public string $mainType;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/chart_combination.html
     * @param string $mainType The type of the non-listet "normal" data entrys
     * @param string $diffTypes The types of the differring data entrys like in chart.data.types -> https://c3js.org/samples/chart_combination.html
     * @param bool $showToolTip Whether to show a tooltip on the chart (default=false)
     */
    public function __construct(string $id, array $data, string $mainType, string $diffTypes, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;
        $this->data = $data;
        $this->diffTypes = $diffTypes;
        $this->mainType = $mainType;
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
                    columns: $jsonString,
                    type: '".$this->mainType."',
                    types: ".$this->diffTypes."
                },
                bindto: '#".$this->id."',
                tooltip: {show: ".$jsonShowString."}
            });
            </script>
        ";
    }
}
?>