<?php
class StackedAreaChart extends UIChart {

    public string $id;
    public array $data;
    public array $groups; 

    public function __construct(string $id, array $data, array $groups)
    {
        $this->id = $id;

        //[['data1', 'data2']]
        $this->groups = $groups;

        $this->data = $data;
    }

    public function preRender(){
        echo '<div id="'.$this->id.'"></div>';
    }
    
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