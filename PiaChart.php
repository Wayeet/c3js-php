<?php
class PieChart {

    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function preRender(){
        echo '<div id="'.$this->id.'"></div>';
    }
    
    public function render() {
        echo "
            <script>
            var chart = c3.generate({
                data: {
                    type : 'pie',
                    columns: [
                        ['data1', 81.5],
                        ['data2', 18.5]
                    ]
                },
                bindto: '#".$this->id."'
            });
            </script>
        ";
    }
}
?>