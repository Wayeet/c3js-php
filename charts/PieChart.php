<?php
namespace C3Charts;
/**
 * Represents a PieChart (https://c3js.org/samples/simple_multiple.html)
 */
class PieChart extends UIChart {

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
        //     ['data1', 81.5],
        //     ['data2', 18.5]
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