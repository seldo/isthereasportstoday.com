<?php
//curl http://sports.yahoo.com/mlb/teams/sfo/ical.ics > ical.ics
$ics = file("ical.ics");

while( $cal_line = array_shift($ics) ) {
    if( preg_match("/^BEGIN:VEVENT/", $cal_line) )  {
        $start = 0;
        $now   = 0;
        $who   = '';
        while( $event_line = array_shift($ics) ) {
            if( preg_match("/^DTSTART:(\d{0,8})/",$event_line,$matches) ) {
                $start = $matches[1];
            }
            elseif( preg_match("/^SUMMARY:(San Francisco)/", $event_line, $matches) ) {
                # away game
                last;
            }
            elseif( preg_match("/^SUMMARY:(.*) at San Francisco/", $event_line, $matches) ) {
                $who = $matches[1];
            }
            elseif( preg_match("/^DTSTAMP:(\d{0,8})/", $event_line, $matches) ) {
                $now = $matches[1];
            }
            elseif( preg_match("/^END:VEVENT/", $event_line, $matches) ) {
                if( $start == $now ) {
		    there_is_a_sports();
		    exit;
                }
            }
        }
    }
}    
there_is_not_a_sports();

function there_is_a_sports() {
    echo file_get_contents("yes.1.tmpl");    
}

function there_is_not_a_sports() {
    echo file_get_contents("no.1.tmpl");
}

