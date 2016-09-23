using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0203
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Hello, welcome to my application.");
            
            bool exit = false;

            // Repeat until users type `Exit`
            do
            {
                // Guide the user
                Console.WriteLine("What is the sentence? (Type 'Help' if you don't know what to do.)");
                string command = Console.ReadLine().ToLower();
                switch (command)
                {
                    case "help":
                        Console.WriteLine("Type `Help` to get information. Type `Exit` to exit the application. Type anything else to see it printed out vertically.");
                        break;
                    case "exit":
                        Console.WriteLine("Goodbye...");
                        exit = true;
                        break;
                    default:
                        printVertically(command);
                        break;
                }
            } while (!exit);
        }

        // Print a given sentence vertically
        static void printVertically(string line)
        {
            for (int i = 0; i < line.Length; i++)
            {
                Console.WriteLine(line[i]);
            }
        }
    }
}
