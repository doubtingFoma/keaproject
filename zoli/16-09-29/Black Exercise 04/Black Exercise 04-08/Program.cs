using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_08
{
    class Program
    {
        static void Main(string[] args)
        {
            //creating arrays of numbers
            int[] NumbersOne = { 1, 2, 3, 4, 5 };
            int[] myNumbers = { 12, 23, 32, 23, 32 };

            //call the GetSum function and pass the NumbersOne array to it
            Console.WriteLine("The sum of the numbers is {0}", GetSum(NumbersOne) );

            //same as above
            Console.WriteLine("sum {0}", GetSum(myNumbers));

            //directly write numbers to the function call
            Console.WriteLine("The sum of the numbers is {0}", GetSum(1, 2, 3));


            Console.ReadKey();
        }

        static int GetSum(params int[] Numbers)
        {
            int Sum = 0;
            //simply add every number to the Sum
            for (int i = 0; i < Numbers.Length; i++)
            {
                Sum += Numbers[i];
            }

            return Sum;
        }

    }
}
