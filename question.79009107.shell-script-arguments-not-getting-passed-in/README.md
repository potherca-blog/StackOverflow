# shell script arguments not getting passed in

## Question

> Folder Structure
>
>     geoloc-util.sh
>     tests
>       |- test_geoloc_util.bats
>
> from root, I'm able to run the command and the output is as expected
>
> ```sh
> ./geoloc-util.sh "Madison, WI" "94552"
> ./geoloc-util.sh -l "Madison, WI" "94552"
> ./geoloc-util.sh --location "Madison, WI" "94552"
> ```
> The problem I'm having is in the bats file
>
> ```bats
> @test "Valid city and state" {
>   ../geoloc-util.sh --locations "Madison, WI"
>   [ "$status" -eq 0 ]
>   [[ "$output" == *"Location: Madison, WI, US"* ]]
>   [[ "$output" == *"Latitude:"* ]]
>   [[ "$output" == *"Longitude:"* ]]
> }
> ```
>
> For some reason the execution line of `../geoloc-util.sh --locations "Madison, WI"`
> the 2 arguments are not being passed in.  When putting debug code of `echo "$@"` at the top of the .sh file, it just outputs the file path.
>
> I've tried `run`, also `run bash`. Tried to find what documentation I could and I can't figure out why those arguments aren't getting passed in.
>
> expect the bats file test calls to behave the same as invoking the execution on cli

## Answer

I have same directory setup:

```
.
├── geoloc-util.sh
└── tests
    └── test_geoloc_util.bats
```

I have created a naive implementation of the geoloc-util, that also output the parameters it receives, using `${@}`:

```sh
#!/usr/bin/env bash

cat <<TXT
    Parameters: ${@}
    Location: Madison, WI, US
    Latitude:  43°04′29″N
    Longitude: 89°23′03″W
TXT
```

And I have the following test:

```bats
#!/usr/bin/env bats

@test "can run our script" {
    bash ./geoloc-util.sh --locations "Madison, WI"
}

@test "Valid parameters" {
    output="$(bash ./geoloc-util.sh --locations "Madison, WI")"

    [[ "$output" == *'Parameters: --locations'* ]]
}

@test "Valid city and state" {
  run bash ./geoloc-util.sh --locations "Madison, WI"

  [ "$status" -eq 0 ]

  [[ "$output" == *"Location: Madison, WI, US"* ]]
  [[ "$output" == *"Latitude:"* ]]
  [[ "$output" == *"Longitude:"* ]]
}
```

If I run this (from the root of the project) using:

```sh
bats /code/tests --show-output-of-passing-tests
```

Or if you prefer docker:

```sh
docker run -it -v "$PWD:/code" bats/bats:latest --show-output-of-passing-tests /code/tests
```

Then I get the expected output:

```
test_geoloc_util.bats
 ✓ can run our script
       Parameters: --locations Madison, WI
       Location: Madison, WI, US
       Latitude:  43°04′29″N
       Longitude: 89°23′03″W
 ✓ Valid parameters
 ✓ Valid city and state
```
Some things to note:

 1. As I run bats from the project root, the path to `geoloc-util.sh` is `./geoloc-util.sh` **not** `../geoloc-util.sh`
 2. As you can see, `--show-output-of-passing-tests` shows output, but _only_ if it is not swallowed by a sub-shell or by `run`. There are also `--print-output-on-failure` and `--verbose-run` that are worth looking into or (for more complex tests) `--gather-test-outputs-in`
 3. If `run bash ...` is not used, `$output` and `$status` are not filled, meaning you will have to grab them yourself. Hence the subshell in the "Valid parameters" test.

