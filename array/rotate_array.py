# program to ratate array arr on given index d
# ref: https://www.hackerrank.com/challenges/array-left-rotation/problem

# brute-force approach
def solution(arr, d):
    final = arr[d:] + arr[:d]
    return final


#optimised
def optimised(arr, d):
  return


arr = [1,2,3,4,5]
d = 4
assert solution(arr, d) == [5,1,2,3,4], "Failed"
print("PASSED")
