using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0403
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Please provide me a number: ");
            int number1 = Int32.Parse(Console.ReadLine());

            Console.WriteLine("Please provide me another number: ");
            int number2 = Int32.Parse(Console.ReadLine());

            Console.WriteLine("Please provide me a third number: ");
            int number3 = Int32.Parse(Console.ReadLine());

            int biggerBetween1And2 = GetMax(number1, number2);
            int biggestNumber = GetMax(number3, biggerBetween1And2);

            Console.WriteLine($"This is the biggest number: {biggestNumber}");

        }

        static int GetMax(int int1, int int2)
        {
            int biggerNumber = int1 > int2 ? int1 : int2;
            return biggerNumber;
        }
    }
}
