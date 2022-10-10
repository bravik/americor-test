<?php

return [
    'generic' => '{event}',
    'task' => '{eventName}: {taskTitle}',
    'sms' => '{smsText}',
    'fax-type' => '{type,select,poa_atc{POA/ATC},revocation_notice{Revocation} other{Fax}}',
    'call' => '{status}',
    'call-with-disposition' => '{status} <span class="text-grey">{disposition}</span>',
    'call-deleted' => '<i>Deleted</i>',
    'customer-quality-changed' => '{event}: {oldValue,select,active{Active} rejected{Rejected} community{Community} unassigned{Unassigned} trickle{Trickle} other{not set}} to {newValue,select,active{Active} rejected{Rejected} community{Community} unassigned{Unassigned} trickle{Trickle} other{not set}}',
    'customer-quality-changed-html' => '{event}: <span class="badge badge-pill badge-warning">{oldValue,select,active{Active} rejected{Rejected} community{Community} unassigned{Unassigned} trickle{Trickle} other{<i>not set</i>}}</span> to <span class="badge badge-pill badge-success">{newValue,select,active{Active} rejected{Rejected} community{Community} unassigned{Unassigned} trickle{Trickle} other{<i>not set</i>}}</span>',
    'customer-type-changed' => '{event}: {oldValue,select,lead{Lead} deal{Deal} loan{Loan} other{not set}} to {newValue,select,lead{Lead} deal{Deal} loan{Loan} other{not set}}',
    'customer-type-changed-html' => '{event}: <span class="badge badge-pill badge-warning">{oldValue,select,lead{Lead} deal{Deal} loan{Loan} other{<i>not set</i>}}</span> to <span class="badge badge-pill badge-success">{newValue,select,lead{Lead} deal{Deal} loan{Loan} other{<i>not set</i>}}</span>',
];
