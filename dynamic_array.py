# A python program to impliment an algorithm on dynamic array.
#reference: https://www.hackerrank.com/challenges/dynamic-array/problem
"""
1. given n, testcases
2. initiate lastAnswer = 0, idx = 0,arr (2d array of length n), res = []
3. foreach testcase:
  3.1. idx = (testcase[1] ^ lastAnswer) % n
  3.2. if testcase[0] == 1
    3.2.1. arr[idx].append(testcase[2])
  3.3. elif testcase[0] == 2
    3.3.1. idx2 = testcase[2] % len(arr[idx])
    3.3.2. last = arr[idx][idx2]
    3.3.3. res.append(last)
  3.4. else print(INVALID)
4. return res
"""


# logical test cases
a_logical_n = 0
a_logical_arr = [[1,0,1]]
expected_logical_a = False

b_logical_n = 3
b_logical_arr = []
expected_logical_b = []


# test case 1:
a_testcase_n = 2
a_testcase_arr = [[1,0,5],[1,1,7],[1,0,3],[2,1,0],[2,1,1]]
expected_testcase_a = [7, 3]


def main_logic(n, queries):
    """
        Parameters:
            num (n): index of 2d array
            list (queries): testcases which needs to be checked
        Returns:
            string or bool(res): result
    """
    lastAnswer = 0
    arr = []
    res = []
    for _ in range(0,n):
        arr.append([])
        
    for testcase in queries:
        try:
            idx = (testcase[1] ^ lastAnswer) % n
            if testcase[0] == 1:
                arr[idx].append(testcase[2])
            else:
                idx2 = testcase[2] % len(arr[idx])
                lastAnswer = arr[idx][idx2]
                res.append(lastAnswer)
        except (IndexError, ZeroDivisionError):
                res = False
    return res

def optimised_main_logic(n):
    return


# Driver code | Logical testcases

brute_force_output = main_logic(a_logical_n, a_logical_arr)
assert brute_force_output == expected_logical_a, "Failed in logical case a: brute force approach"

# optimised_output = optimised_main_logic(a_logical_n, a_logical_arr)
# assert optimised_output == expected_logical_b, "Failed in logical a: optimised approach"


brute_force_output = main_logic(b_logical_n, b_logical_arr)
assert brute_force_output == expected_logical_b, "Failed in logical testcase b: brute force approach"

# optimised_output = optimised_main_logic(b_logical_n, b_logical_arr)
# assert optimised_output == expected_logical_b, "Failed in logical b: optimised approach"


# Driver code | Situational testcase 1
brute_force_output = main_logic(a_testcase_n, a_testcase_arr)
assert brute_force_output == expected_testcase_a, "Failed in testcase a: brute force approach"

# optimised_output = optimised_main_logic(a_testcase_n, a_logical_arr)
# assert optimised_output == expected_testcase_a, "Failed in testcase a: optimised approach"

# Test case Dry run
"""
    main_logic:
        1. n = 2, testcases = [[1,0,5],[1,1,7],[1,0,3],[2,1,0],[2,1,1]]
        2. lastAnswer = 0, idx = 0,arr (2d array of length n), res = []
        3. foreach testcase:
          3.1. idx = (0 ^ 0) % 2 = 0 | (1 ^ 0) % 2 = 1 | (0 ^ 0) % 2 = 0 | (1 ^ 1) % 2 = 1 | (1 ^ 7) % 2 = 0
          3.2. if 1 == 1
            3.2.1. arr[0].append(5) | arr[1].append(7) | arr[0].append(3)
          3.3. elif 2 == 2
            3.3.1. idx2 = 0 % len(arr[1]) = 0 | 1 % len(arr[0]) = 1
            3.3.2. last = arr[1][0] = 7 | last = arr[0][1] = 3
            3.3.3. res.append(7) | res.append(3)
          3.4. else print(INVALID)
        4. return res [7, 3]
    optimized logic:
        SAME
        Time complexity: O(n) .... since forloop(step 3) and inside anyone of the condition will get checked ie. O(1)
        Space complexity: 4(n) + 3t(testcases) + 4(lastAnswer) + 4(idx) + ln(arr) + 4(idx) + (t-l)(res)
"""

# yayyy!!
print("_B-)__ALL TEST CASES PASSED__B-)_")


# utitity function to calculate gcd of the number
def utility_function(a, b): 
    return
