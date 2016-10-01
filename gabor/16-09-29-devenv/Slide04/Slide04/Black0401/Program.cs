using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0401
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create strings and call method
            string string1 = "Gabor";
            string string2 = "Pinter";
            string concatenatedString = GetFullName(string1, string2);
            Console.WriteLine(concatenatedString);
        }

        // Method for creating full name
        static string GetFullName(string string1, string string2)
        {
            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(string1);
            sb.Append(string2);
            return sb.ToString();
        }
    }
}
