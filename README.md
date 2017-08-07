[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Nexosis/functions?utm_source=RapidAPIGitHub_NexosisFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Nexosis Package
Machine Learning for Developers.
* Domain: [nexosis.com](http://www.nexosis.com/)
* Credentials: apiKey

## How to get credentials: 
1. Sign in [developers.nexosis.com](https://developers.nexosis.com/).
2. Navigate to [developer page](https://developers.nexosis.com/developer).
3. Create new application.

## Custom datatypes:
  |Datatype|Description|Example
  |--------|-----------|----------
  |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
  |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
  |List|Simple array|```["123", "sample"]```
  |Select|String with predefined values|```sample```
  |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Nexosis.addDataToDataset
This operation creates a new dataset with the specified rows, or if the dataset already exists, adds rows to the dataset. If the specified data contains records with timestamps that already exist in the dataset, those records will be overwritten.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName| String     | Name of the dataset to which to add data.

## Nexosis.deleteDataFromDataset
If a date range is specified, then only data in that date range is removed from the dataset. Otherwise, all data is removed from the dataset.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName| String     | Name of the dataset from which to remove data
| startDate  | DatePicker | Format - date-time (as date-time in ISO8601). Limits data removed to those on or after the specified date.
| endDate    | DatePicker | Format - date-time (as date-time in ISO8601). Limits data removed to those on or before the specified date.
| cascade    | Select     | Options for cascading the delete. When cascade=forecast, also deletes forecasts for the dataset. When cascade=sessions, also deletes sessions associated with the dataset. If start and/or end date are supplied, sessions requested in that date range are deleted.

## Nexosis.getAllDatasets
Gets the list of datasets that have been uploaded.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Subscription key which provides access to this API. Found in your Profile.
| partialName| String     | Limits results to only those datasets with names containing the specified value.
| page       | Number     | Format - int32. Zero-based page number of datasets to retrieve.
| pageSize   | Number     | Format - int32. Count of datasets to retrieve in each page (max 1000).

## Nexosis.getSingleDataset
Gets the data for a particular dataset.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName| String     | Name of the dataset for which to retrieve data.
| startDate  | DatePicker | Format - date-time (as date-time in ISO8601). Limits data removed to those on or after the specified date.
| endDate    | DatePicker | Format - date-time (as date-time in ISO8601). Limits data removed to those on or before the specified date.
| page       | Number     | Format - int32. Zero-based page number of datasets to retrieve.
| pageSize   | Number     | Format - int32. Count of datasets to retrieve in each page (max 1000).
| include    | List       | Limits results to the specified columns.

## Nexosis.importFromS3
Import data into Axon from a file on S3.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName| String     | Name of the dataset.
| bucket     | String     | S3 bucket.
| path       | String     | S3 path.
| region     | String     | Bucket region.

## Nexosis.getAllImports
Gets the list of imports that have been created for the company associated with your account.

| Field              | Type       | Description
|--------------------|------------|----------
| apiKey             | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName        | String     | Limits imports to those for a particular dataset.
| requestedAfterDate | DatePicker | Format - date-time (as date-time in ISO8601). Limits imports to those requested on or after the specified date.
| requestedBeforeDate| DatePicker | Format - date-time (as date-time in ISO8601). Limits imports to those requested on or before the specified date.
| page               | Number     | Format - int32. Zero-based page number of datasets to retrieve.
| pageSize           | Number     | Format - int32. Count of datasets to retrieve in each page (max 1000).

## Nexosis.getSingleImport
Retrieve information about request to import data into Axon.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Subscription key which provides access to this API. Found in your Profile.
| importId| String     | Format - uuid. The Id of the Import.

## Nexosis.createForecastSession
Forecast sessions are used to predict future values for a dataset. To create a forecast session, specify the dataset to forecast, as well as the start and end dates of the forecast period. The Nexosis API will execute a series of machine learning algorithms to approximate future values for the dataset. The forecast start date should be on the same day as (or before) the last date in the dataset. If there is a gap between your forecast start date and the date of the last record in your data set, the Nexosis API will behave as if there is no gap.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName   | String     | Name of the dataset to forecast.
| targetColumn  | String     | Column in the specified dataset to forecast.
| startDate     | datePicker | Format - date-time (as date-time in ISO8601). First date to forecast.
| endDate       | datePicker | Format - date-time (as date-time in ISO8601). Last date to forecast.
| resultInterval| Select     | The interval at which predictions should be generated. Possible values are Hour, Day, Week, Month, and Year. Defaults to Day.
| callbackUrl   | String     | The Webhook url that will receive updates when the Session status changes. If you provide a callback url, your response will contain a header named Nexosis - Webhook - Token.You will receive this same header in the request message to your Webhook,which you can use to validate that the message came from Nexosis.
| isEstimate    | Boolean    | If specified, the session will not be processed. The returned Nexosis-Request-Cost header will be populated with the estimated cost that the request would have incurred.

## Nexosis.createImpactSession
Impact sessions are used to determine the impact of a particular event on a dataset. For example, a sale at a restaurant may impact daily sales or customer counts.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName   | String     | Name of the dataset for which to determine impact.
| targetColumn  | String     | Column in the specified dataset for which to determine impact.
| eventName     | String     | Name of the event for which to determine impact.
| resultInterval| Select     | The interval at which predictions should be generated. Possible values are Hour, Day, Week, Month, and Year. Defaults to Day.
| startDate     | datePicker | Format - date-time (as date-time in ISO8601). First date of the event.
| endDate       | datePicker | Format - date-time (as date-time in ISO8601). Last date of the event.
| callbackUrl   | String     | The Webhook url that will receive updates when the Session status changes
| isEstimate    | Boolean    | If specified, the session will not be processed. The returned Nexosis-Request-Cost header will be populated with the estimated cost that the request would have incurred.

## Nexosis.deleteSession
Removes a single session from your account.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Subscription key which provides access to this API. Found in your Profile.
| sessionId| String     | Format - uuid. The Id of the session to delete.

## Nexosis.deleteAllSession
Removes Sessions from your account.

| Field              | Type       | Description
|--------------------|------------|----------
| apiKey             | credentials| Subscription key which provides access to this API. Found in your Profile.
| type               | Select     | The type of session to be deleted (Forecast or Impact).
| dataSetName        | String     | Limits sessions to those for a particular dataset.
| eventName          | String     | Limits impact sessions to those for a particular event.
| requestedAfterDate | String     | Format - date-time (as date-time in ISO8601). Limits sessions to those requested on or after the specified date.
| requestedBeforeDate| String     | Format - date-time (as date-time in ISO8601). Limits sessions to those requested on or before the specified date.

## Nexosis.getAllSession
Gets the list of sessions that have been created for the company associated with your account.

| Field              | Type       | Description
|--------------------|------------|----------
| apiKey             | credentials| Subscription key which provides access to this API. Found in your Profile.
| dataSetName        | String     | Limits sessions to those for a particular dataset.
| eventName          | String     | Limits impact sessions to those for a particular event.
| requestedAfterDate | String     | Format - date-time (as date-time in ISO8601). Limits sessions to those requested on or after the specified date.
| requestedBeforeDate| String     | Format - date-time (as date-time in ISO8601). Limits sessions to those requested on or before the specified date.
| page               | Number     | Format - int32. Zero-based page number of sessions to retrieve.
| pageSize           | Number     | Format - int32. Count of sessions to retrieve in each page (max 1000).

## Nexosis.getSessionResult
Gets the forecast or impact results of a particular session

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Subscription key which provides access to this API. Found in your Profile.
| sessionId| String     | Format - uuid. Session identifier for which to retrieve results.

## Nexosis.getSingleSession
Gets the forecast or impact results of a particular session

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Subscription key which provides access to this API. Found in your Profile.
| sessionId| String     | Format - uuid. Session identifier of the session to retrieve.

## Nexosis.getSessionStatus
The response to this endpoint adds a nexosis-session-status HTTP response header indicating the completion status of the session.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Subscription key which provides access to this API. Found in your Profile.
| sessionId| String     | Format - uuid. Session identifier of the session to retrieve.

