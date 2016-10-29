using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0303
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create array of ints
            int[] myInts = new int[10];
            Console.WriteLine("Please type 10 numbers:");

            // Create a counter
            int counter = 0;

            // Loop through array
            foreach (var item in myInts)
            {
                // Do until user enters valid number
                bool isValidNumber;
                do
                {
                    // Guide
                    Console.WriteLine($"Please type the {counter}. number: ");

                    // Try to convert input to number
                    int validNumber;
                    string myNumber = Console.ReadLine().ToString();
                    isValidNumber = Int32.TryParse(myNumber, out validNumber);
                    isValidNumber = validNumber > 0;

                    // If number is not valid, provide error msg, otherwise add to array
                    if (!isValidNumber)
                    {
                        Console.WriteLine("Please provide a number. Try again.");
                    } else
                    {
                        myInts[counter] = validNumber;
                    }
                } while (!isValidNumber);

               // Increment counter
               counter++;
            }

            // Create new array out of entered numbers in descending order
            Console.WriteLine("Here are the entered numbers sorted from greatest to least:");
            int[] myNewInts = myInts.OrderByDescending(i => i).ToArray();

            // Print out array items
            foreach (var item in myNewInts)
            {
                Console.WriteLine(item);
            }

        }
    }
}
