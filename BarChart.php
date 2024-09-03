<?php
/**
 * Represents a BarChart (https://c3js.org/samples/chart_bar.html)
 */
class BarChart extends UIChart {

    public string $id;
    public array $data;
    public bool $showToolTip;

    /**
     * @param string $id The HTML "id"-Tag
     * @param array $data Data in the format shown in chart.data.columns -> https://c3js.org/samples/chart_bar.html
     * @param bool $showToolTip Whether to show a tooltip on the chart (default=false)
     */
    public function __construct(string $id, array $data, bool $showToolTip = false)
    {
        $this->id = $id;
        $this->showToolTip = $showToolTip;
        $this->data = $data;
    }

    /**
     * Renders the charts wrapper-element
     * @return void
     */
    public function preRender(): void{
        echo '<div id="'.$this->id.'"></div>';
    }
    
    /**
     * Render the chart to the wrapper
     * @return void
     */
    public function render(): void {
        $jsonString = json_encode($this->data);
        $jsonShowString = json_encode($this->showToolTip);
        echo "
            <script>
            var chart = c3.generate({
                data: {
                    columns: ".$jsonString.",
                    type: 'bar'
                },
                bindto: '#".$this->id."',
                tooltip: {show: ".$jsonShowString."}
            });
            </script>
        ";
    }
}
?>