<?php 

function getDataFromPersonnal($col)
{
    if ( !empty(session()->get('subscripe.personal')) ) {
        $session_collection = collect(session()->get('subscripe.personal'));
        if ( count($session_collection) ) {
            return collect(session()->get('subscripe.personal'))[$col] ?? null;
        }
    }

    return null;
}

function getPhoneNumber()
{
    return '+'.collect(session()->get('subscripe.personal'))['country_code'].collect(session()->get('subscripe.personal'))['phone'];
}

function getDataFromClinic($col)
{
    if ( !empty(session()->get('subscripe.clinic')) ) {
        $session_collection = collect(session()->get('subscripe.clinic'));
        if ( count($session_collection) ) {
            return collect(session()->get('subscripe.clinic'))[$col] ?? null;
        }
    }

    return null;
}