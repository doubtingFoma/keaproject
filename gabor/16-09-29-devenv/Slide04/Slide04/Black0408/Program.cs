using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0408
{
    class Program
    {
        static void Main(string[] args)
        {
            int[] myNumbers = { 12, 23, 32, 23, 32 };
            Console.WriteLine($"sum: {GetSum(myNumbers)}");
            Console.WriteLine("sum {0}", GetSum(1, 2, 3));
        }

        static int GetSum(params int[] myNumbers)
        {
            int sum = 0;
            for (int i = 0; i < myNumbers.Length; i++)
            {
                sum += myNumbers[i];
            }
            return sum;
        }
    }
}
