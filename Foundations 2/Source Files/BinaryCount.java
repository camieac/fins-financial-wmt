package Grammar;

import java.io.PrintWriter;
import java.lang.Exception;

import org.antlr.v4.runtime.ANTLRFileStream;
import org.antlr.v4.runtime.CommonTokenStream;
import org.antlr.v4.runtime.tree.ParseTree;

public class BinaryCount {

	
    public static void main(String[] args) throws Exception {


        CWLexer lexer = new CWLexer(new ANTLRFileStream("input.txt")); // Taking in input.txt file.
        CWParser parser = new CWParser(new CommonTokenStream(lexer));
        ParseTree tree = parser.parse();
        BinaryTCountVisitor visitor = new BinaryTCountVisitor();
        BinaryT.AST t = visitor.visit(tree);
        System.out.println (t.toString());
        
        PrintWriter writer = new PrintWriter("output.txt", "UTF-8"); // Writing to an output.txt file.
        writer.print(t.toString());
        writer.close();

    }
}
