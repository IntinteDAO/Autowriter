<?php

function diff($ethereum, $bitcoin) {
return number_format((str_replace(' ', '', $ethereum)*100)/str_replace(' ', '', $bitcoin), 2, '.', '');
}