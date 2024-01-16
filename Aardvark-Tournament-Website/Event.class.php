<?php

class Event{
	public $idevent;
	public $eventName;
	public $eventStartTime;
    public $eventEndTime;
    public $teamId;
    public $eventLocation;
		
    public function showEvent(){
        $edit = "edit";
        $delete = "Delete";

        return "<tr>
            <td>{$this->eventId}</td>
            <td>{$this->eventName}</td>
            <td>{$this->eventStartTime}</td>
            <td>{$this->eventEndTime}</td>
            <td>{$this->teamId}</td>
            <td>{$this->eventLocation}</td>
            <td id = 'action'><a href='editEvent.php?id={$this->idevent}'>{$edit}</a>
            <a href='deleteEvent.php?id={$this->idevent}'>{$delete}</a>
            </td>
                </tr>\n";
    }
	
	
}