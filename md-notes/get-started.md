# First Note

## Section 1 (Perparing Actions)

by default actions are working but if it dosn't work we can still make it work

> form _settings_ -> _Actions_ -> _General_ -> _Allow all actions and reusable workflows_

### workflows

all workflows are located in `.github/workflows` directory and it's extension is `.yml` or `.yaml`

### yaml file syntax

key and value separted by a column `:`

value can be as another key-value pair too but we have to use indentation

to add list as a value it has to start with `-`

```yml
    name: Mohamed Saad Gheit

    family: 
        father: Ahmed
        mother: Sara
        children:
            son: 
                - Yousef
                - Nader
            daughter: Nada
```

## Section 2 (Events Fundamentals)

Events are devided to 4 types

- Inside Repository
- Outside Repository
- Scheduled Times
- Manual
  
You can see an example of Manual in [basics-first-workflow](../.github/workflows/01-basics-first-workflow.yml)

As for the Inside Repository we can find examples of them in

- [basics events](../.github/workflows/02-basics-events.yml)
- [basics events filter](../.github/workflows/03-basics-events-filters.yml)

all trigers are listed in the [Github Actios Documentaions](https://docs.github.com/en/actions/writing-workflows/choosing-when-your-workflow-runs/events-that-trigger-workflows) it can be push, pull,..etc.

Now we can see the Notes of each

---

### Inside Repository Events

It can be single action `on: push` or more than one `on: [push, pull_request]`

Some trigger have default activity type:

By default, a workflow only runs when a `pull_request` event's activity type is `opened`, `synchronize`, or `reopened`

To make the filteration we'll make the event as a key and the activity as a value of the types key inside the event. If we have a list of the activity types we can type this in both ways

```yml
    # first way
    on:
        pull_request:
            types:
                - closed
                - opened

    # second way
    on:
        pull_request:
            types: [closed, reopened]
```

In push there is no sub activity BUT we can identify the branch we want our script listen to or lesten for all branches except one

```yaml
    on:
        push:
        # listen to specific branches
            branches:
                -master
        # listen to all except specific branches
            branches-ignore:
                - main
                - 02-basics-events
```

Same as branches we can do with `tags`  and `paths` but in paths we specify our location form the root of our project not current workfolw file

> Note in when dealing with `paths` we can use `*` to specify all files in directory " if we tyep *.php" we need to get all files in same directory wiht extinstion of php BUT if we want to get all files in directory and sub-directory we use `**` so in this cas it'll be "**.php"

---

### OutSide Repository Events

It can be called from outside the repo but need to spiceify the type
`types: [custom-event]` anyone call this event will trigger this workflow

It simply allows external tools, scripts, or even other GitHub repositories to trigger a workfolw

as the example [external trigger](../.github/workflows/04-basics-events-external-trigger.yml) if any outside script or repo send a dispatch with event_type `"custom-event"` will start the workflow

> to trigger this workflow, the external source must user hte GitHub API and have:
>
> - A **Personal Acess Token** with `repo` permissions.
> - The correct **repo name** and **event type**
>
example API call form a curl command:

```curl
curl -L \
  -X POST \
  -H "Accept: application/vnd.github+json" \
  -H "Authorization: Bearer <YOUR-TOKEN>" \
  -H "X-GitHub-Api-Version: 2022-11-28" \
  https://api.github.com/repos/OWNER/REPO/dispatches \
  -d '{"event_type":"custom-event"}'
```

**Use cases** for `repo_dispatch`:

- Triggering tests or deployment from a frontend repo

- Central admin dashboard triggering multiple backend services

- Scripts or cron jobs triggering a GitHub Action remotely

---

### Schedule Events

These are time-based triggers, like cron jobs.

To set one up, use the `schedule` event with `cron` syntax:

```yaml
on:
    schedule:
        - cron: '0 0 * * 1' #every monday at midnight UTC
```

This can be used for:

- Automated backups

- Weekly reports

- Nightly tests

Cron is in **UTC** time and follows this format:
`minute hour day-of-month month day-of-week`

```text
┌───────────── minute (0 - 59)
│ ┌───────────── hour (0 - 23)
│ │ ┌───────────── day of the month (1 - 31)
│ │ │ ┌───────────── month (1 - 12 or JAN-DEC)
│ │ │ │ ┌───────────── day of the week (0 - 6 or SUN-SAT)
│ │ │ │ │
│ │ │ │ │
│ │ │ │ │
* * * * *
```

You can use [crontab guru](https://crontab.guru/) to help generate our cron syntax

Note that the smallest cron you can use is every five minutes `"*/5 * * * *"` and github serves can take hour to start run the crons on its servers

---

### Context

context is a predefiend github variables it filled with data when the workflow runs.

you can use github context by using `${{ context }}`
as an example you can see the [basic context file](../.github/workflows/06-basics-context.yml) to see an example for it

for the if condition we use the following syntax `if: ${{ context }}` as the example in the file [basic condition file](../.github/workflows/07-basics-conditions.yml) as you can see the the commit in the line 12 we can use coditions without wrapping it in the  `${{ }}` experssion

---

### Variables

We have 4 types of variables
  
- environment variables
- configuration variables
- sectets
- default variables
  
#### Environment Varialbes

each workflow runs on runner (VM like ubuntu) so these vars are related with this machine only and belongs to this workflow only too

to declare environment varibale we use the keyword `env:` followed by key-value pair

**Naming Convention** in environment vars to keep the name all CAP and descriptive if composite use underscore (_) and avoid default variables names

We can access the environment vars using directly like line 16 in [basic variables file](../.github/workflows/08-basics-variables.yml) or we can use the best practice the context `env.VAR_NAME` as used in line 17 in same file

#### Configuration Varialbes

configuration varivalbes can be used in working repository and can be accessed from multiple workflows in same repo unlike environmnet variables

> to init a config var we go to **`settings -> Secrets and variables -> Actions -> Variables -> New repository variable`**

and the context variable for conf vars are `${{ var.context }}`

#### Secrets

Same as configuration Variables but the value is masked

> to init a config var we go to **`settings -> Secrets and variables -> Actions -> Secrets -> New repository secret`**

and the context variable for conf vars are `${{ secrets.context }}`

#### Default Variables

the predefied vars that github gives it to us so we can avoid nameing any environmnet vars with same name

to see every default var we can use the `run: env` as shown in the [basic var conf file](../.github/workflows/09-basics-varibales-configuration.yml)

we can avoid naming vars that start with prefex `GITHUB_` or `RUNNER_`

---

### Experessions

the value inside the `${{ }}` is called experssion so any context is mainly an expression.

the purpose of expression is to give a dynamic value to a variable to use in our workflow genrally.

for expressions you can use boolean, null, number, string 

> You don't need to enclose strings in ${{ and }}. However, if you do, you must use single quotes (') around the string. To use a literal single quote, escape the literal single quote using an additional single quote (''). Wrapping with double quotes (") will throw an error.

``` yml
env:
  MY_NUM: ${{ null }}
  BOOL_NUM: ${{ false }}
  INT_NUM: ${{ 711 }}
  FLOAT_NUM: ${{ -9.2 }}
  HEXADECIMAL_NUM: ${{ 0xff }}
  EXPONENTILA_NUM: ${{ -2.99e-2 }}
  STRING_VALUE: Mona the Octocat
  STRING_IN_BRACES: ${{ 'It''s open source!' }}
  ```

#### Functions

GitHub offers a set of built-in functions that you can use in expressions. Some functions cast values to a string to perform comparisons. GitHub casts data types to a string using these conversions:

---

| Type | Result |
|------|--------|
|Null |' '|
|Boolean|'true' or 'false'|
|Number|Decimal format, exponential for large numbers|
|Array|Arrays are not converted to a string|
|Object | Objects are not converted to a string|

`contains( search, item )`

`contains(github.event.issue.labels.*.name, 'bug')`  
 returns `true` if the issue related to the event has a label `"bug"`.

Instead of writing `github.event_name == "push" || github.event_name == "pull_request"`
 you can use contains() with fromJSON() to check if an array of strings contains an item.
 For example, `contains(fromJSON('["push", "pull_request"]'), github.event_name)` returns true if `github.event_name` is `"push"` or `"pull_request"`.

`startsWith( searchString, searchValue )`

`endsWith( searchString, searchValue )`

`format( string, replaceValue0, replaceValue1, ..., replaceValueN)`

 Replaces values in the string, with the variable `replaceValueN`. Variables in the string are specified using the `{N}` syntax, where `N` is an integer. You must specify at least one `replaceValue` and `string`. There is no maximum for the number of variables (`replaceValueN`) you can use. Escape curly braces using double braces.

you can see example of format in the [basics expresssions file](../.github/workflows/11-basics-expressions.yml)

`join( array, optionalSeparator )`

 The value for `array` can be an array or a string. All values in `array` are concatenated into a string. If you provide `optionalSeparator`, it is inserted between the concatenated values. Otherwise, the default separator `,` is used. Casts values to a string.

 example `join(github.event.issue.labels.*.name, ', ')` may return _'bug, help wanted'_

`toJSON(value)`

Returns a pretty-print JSON representation of `value`. You can use this function to debug the information provided in contexts.

`fromJSON(value)`

 Returns a JSON object or JSON data type for `value`. You can use this function to provide a JSON object as an evaluated expression or to convert any data type that can be represented in JSON or JavaScript, such as strings, booleans, null values, arrays, and objects.

---

### needs

need is a job dependency that define the workflow of the `jobs` as shown in the demo example in [basics needs file](../.github/workflows/13-basics-needs.yml) we can't test if the bulid fails and we can't deploy if the test fail so we use the `needs` in jobs scope. we can make same consept with `steps` using `if:`

---
