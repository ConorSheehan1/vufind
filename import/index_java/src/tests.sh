INDEX_JAVA="$VUFIND_HOME/import/index_java"
INDEX_SRC="$INDEX_JAVA/src"
INDEX_LIB="$VUFIND_HOME/import/lib"
INDEX_LIB_LOCAL="$VUFIND_HOME/import/lib_local"
TEST_LIB="$INDEX_SRC/tests/lib"
BIN_DIR="$INDEX_JAVA/bin"
for i in $VUFIND_HOME/import/solrmarc_core_*.jar; do SOLR_MARC="$i"; done
SOLRJ_LIB="$VUFIND_HOME/solr/vendor/dist/solrj-lib/*.jar"

CLASS_PATH="$INDEX_SRC:$INDEX_LIB_LOCAL/ini4j-0.5.2-SNAPSHOT.jar:$INDEX_LIB/log4j-1.2.17.jar:"\
"$SOLRJ_LIB:$TEST_LIB/junit-4.12.jar:$TEST_LIB/hamcrest-core-1.3.jar:$SOLR_MARC"

# compile
echo "Compiling "
javac -cp $CLASS_PATH tests/org/vufind/index/ConfigManagerTest.java

# # run
# echo "Running "
# java -cp $CLASS_PATH org.junit.runner.JUnitCore tests.org.vufind.index.ConfigManagerTest
