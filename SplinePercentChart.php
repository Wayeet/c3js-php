<?php
class SplinePercentChart extends SplineChart {

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
    axis: {
        y: {
            tick: {
                format: function (d) { return d + '%'; } // Prozentzeichen zur Y-Achse hinzufügen
            }
        }
    },
    tooltip: {
        format: {
            value: function (value) { return value + '%'; } // Prozentzeichen zum Tooltip hinzufügen
        }
    }
});
            </script>
        ";
    }
}
?>