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
  
we used the manual in [basics-first-workflow](../.github/workflows/01-basics-first-workflow.yml) as ==> `on: workflow_dispatch`

all trigers are listed in the [Github Actios Documentaions](https://docs.github.com/en/actions/writing-workflows/choosing-when-your-workflow-runs/events-that-trigger-workflows) it can be push, pull,..etc.

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

Same as branches we can do with `tags`  
