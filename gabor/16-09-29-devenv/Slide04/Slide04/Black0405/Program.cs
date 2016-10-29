using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0404
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("How many numbers do you wish to enter? ");
            int loopFor = Int32.Parse(Console.ReadLine());

            int[] numbers = new int[loopFor];

            for (int i = 0; i < loopFor; i++)
            {
                Console.WriteLine($"Please enter a number [{i+1}/{loopFor}]");
                numbers[i] = Int32.Parse(Console.ReadLine());
            }

            int biggestNumber = GetMax(numbers);
            Console.WriteLine($"The biggest number is: {biggestNumber}");
        }

        static int GetMax(int[] numbers)
        {
            int maxNumber = numbers[0];
            for (int i = 0; i < numbers.Length; i++)
            {
                maxNumber = numbers[i] > maxNumber ? numbers[i] : maxNumber;
            }
            return maxNumber;
        }
    }
}
