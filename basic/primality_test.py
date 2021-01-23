# A python program to check if the given number is prime or composite (Primality test)
"""
1. check if the given number(n) is divisible by any of the numbers in range 2 to n-1
2. if yes: Print Prime number else: Print composite number
"""
import sys


# logical test cases
logical_a = -30
expected_logical_a = "Composite number"

logical_b = 2
expected_logical_b = "Prime and Composite number"


# test case 1:
testcase_a = 15
expected_testcase_a = "Composite number"

# test case 2:
testcase_b = 1087
expected_testcase_b = "Prime Number"


def main_logic(n):
    """
        Parameters:
            num (n): number which needs to be checked
        Returns:
            string(res): type of number n 
    """
    res = "Prime Number"

    if n <= 1:
        res = "Composite number"
    elif (n == 2):
        res = "Prime and Composite number"
    else:
        for x in range(3, n-1):
            if (n % x == 0):
                res = "Composite number"
    return res

def optimised_main_logic(n):
    """
        Parameters:
            num (n): number which needs to be checked
        Returns:
            string(res): type of number n 
    """
    res = "Prime Number"

    if n <= 1:
        res = "Composite number"
    elif (n == 2):
        res = "Prime and Composite number"
    elif (n % 2 == 0 or n % 3 == 0):
        res = "Composite number"
    else:
        i = 5
        while (i * i <= n):
            if (n % i == 0 or n % (i + 2) == 0):
                res = "Composite number"
            i = i + 6
    return res


# Driver code
# logical test cases execution
brute_force_output = main_logic(logical_a)
assert brute_force_output == expected_logical_a, "Failed in logical case a: brute force approach"

optimised_output = optimised_main_logic(logical_a)
assert optimised_output == expected_logical_a, "Failed in logical a: optimised approach"


brute_force_output = main_logic(logical_b)
assert brute_force_output == expected_logical_b, "Failed in logical testcase b: brute force approach"

optimised_output = optimised_main_logic(logical_b)
assert optimised_output == expected_logical_b, "Failed in logical b: optimised approach"


# test case 1 execution
brute_force_output = main_logic(testcase_a)
assert brute_force_output == expected_testcase_a, "Failed in testcase a: brute force approach"

optimised_output = optimised_main_logic(testcase_a)
assert optimised_output == expected_testcase_a, "Failed in testcase a: optimised approach"

# solution go through
"""
    main_logic:
        1. if 15 <= 1: False
        2. elif (15 == 2): False
        3. for x from 3 to 14
            4. 15 % 3 == 0
            5. return Composite
        Time complexity: O(n-3)
        Space complexity: 
            1. input: 4(n)
            2. in loop variables: 4(x)
            3. return value: 16
            Total = 24 bytes
    optimized logic:
        1. if 29 <= 1: False
        2. elif (29 == 2): False
        3. elif (29 % 3 == 0 or 29 % 2 == 0): False
        4. else: 
            for 5 to 
        Time complexity: ....
        Space complexity: ....
"""


# test case 2 execution
brute_force_output = main_logic(testcase_b)
assert brute_force_output == expected_testcase_b, "Failed in testcase b: brute force approach"

optimised_output = optimised_main_logic(testcase_b)
assert optimised_output == expected_testcase_b, "Failed in testcase b: optimised approach"

print("_B-)__ALL TEST CASES PASSED__B-)_")

# function to calculate gcd of the number
def utility_function(a, b): 
    return
