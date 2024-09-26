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

