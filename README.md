# Availability Dates WordPress Plugin

Plugin to display availability date on a website calculated as an offset from today's date.

> Scheduling projects starting Monday March 14, 2017.

## Usage

This plugin is used with the `[fe_availability_dates]` shortcode.

e.g. `Scheduling projects starting [fe_availability_dates].`

## Default Behavior

By default, a date two weeks out from the current day is displayed.

## Parameters

- __weekdaystart__: find the first occurence of this day of the week after your available date and use that (e.g. `weekdaystart="monday"`, default: `false`)
- __offset__: how far to offset from the current date (default: `2`)
- __offsetunits__: units for the offset value (default: `weeks`)
- __startingafter__: this is an override value to prevent any availability dates before this date (e.g. `startingafter=2017-03-15`)
- __date_format__: this is the PHP date format to be used when displaying the date (see [PHP date format parameters](http://php.net/manual/en/function.date.php#refsect1-function.date-parameters)) (default: WordPress Date Format setting on the Genearl Settings page)

## Examples

`[fe_availability_dates]` displays the date two weeks from today

`[fe_availability_dates weekdaystart="monday"]` displays the date of the first Monday that occurs at least two weeks from today

`[fe_availability_dates startingafter="2017-03-15"]` displays "March 15, 2017" until March 2nd, then it starts displaying two weeks from the current days date

`[fe_availability_dates format="l F j, Y"]` displays the day of the week and the date (e.g. "Monday March 14, 2016")

## My Preferred Usage

`[fe_availability_dates weekdaystart="monday" format="l F j, Y"]`
